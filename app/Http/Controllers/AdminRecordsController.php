<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\ForwardedDocument;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\DB;


class AdminRecordsController extends Controller
{
    
    public function index(Request $request)
{
    $category = $request->input('category');
    $monthName = $request->input('months');
    $weeks = $request->input('weeks');
    $office = $request->input('office');
    $offices = User::where('role', 'office')->get();
    $status = $request->input('status');
    $type = $request->input('type');
    $datenow = Carbon::now();

    $query = Document::query();

    if ($status === 'active') {
        // Fetch documents where datenow is less than 'active years'
        $query->where('active_years', '>', $datenow);
    } elseif ($status === 'inactive') {
        // Fetch documents where datenow is greater than 'active years'
        $query->where('active_years', '<', $datenow);
    } elseif ($status === 'disposal') {
        // Fetch documents where datenow is greater than 'inactive years'
        $query->where('inactive_years', '<', $datenow);
    }

    if($type ===  'incoming'){
        $query->where('type', 'incoming');
    }elseif($type === 'outgoing'){
        $query->where('type', 'outgoing');
    }

    // Default query to retrieve all documents
    if($office){
        $query->where('fowarded_to', $office);
    }

    if ($category) {
        // Add category filter to the query
        $query->where('category', $category);
    }

    if ($monthName) {
        $monthNumber = Carbon::parse($monthName)->month;
        $query->whereMonth('recieved_date', $monthNumber);
    }

    // Retrieve documents based on the constructed query
    $files = $query->get()->whereIn('status', ['received', 'forwarded', 'accepted']);

    return view('admin.records.index', [
        'files' => $files,
        'selectedCategory' => $category,
        'selectedMonth' => $monthName,
        'selectedWeek' => $weeks,
        'offices' => $offices,
    ]);
}

    public function generateReport(Request $request)
    {
        $category = $request->input('reportcategory');
        $months = $request->input('reportmonth');
        $weeks = $request->input('reportweek');
        $status = $request->input('reportstatus');
        $type = $request->input('reporttype');

        $datenow = Carbon::now();

        $grouped = null;
        // Check if category and months are null
        if (is_null($category) && is_null($months)) {
            // If both category and months are null, get all documents where type is 'incoming'
            $grouped = Document::where('type', 'incoming')
                                ->selectRaw('MONTH(created_at) as month, category, count(*) as count')
                                ->groupBy('month', 'category')
                                ->orderBy('month')
                                ->get();
        }

        $documentCounts = null;
        if($category && is_null($months)){
            // Retrieve all documents with the specified category
            $documents = Document::where('category', $category)->where('type', 'incoming')->get();
        
            // Group the documents by month
            $documentsByMonth = $documents->groupBy(function($document) {
                return $document->created_at->format('F');
            });
        
            // Count the documents in each month
            $documentCounts = $documentsByMonth->map(function($groupedDocuments) {
                return $groupedDocuments->count();
            });
        }

        $documents = null;
        if (is_null($category) && $months) {
            // Convert the month name to a date range
            $startDate = Carbon::createFromFormat('F', $months)->startOfMonth();
            $endDate = Carbon::createFromFormat('F', $months)->endOfMonth();
        
            // Query the database for documents created in the specified month
            $documents = Document::where('type', 'incoming')
                                ->whereBetween('created_at', [$startDate, $endDate])
                                ->select('category', DB::raw('count(*) as total'))
                                ->groupBy('category')
                                ->get();
        }

        // Default query to retrieve all documents
        $query = Document::query();

        if ($status === 'active') {
            // Fetch documents where datenow is less than 'active years'
            $query->where('active_years', '>', $datenow);
        } elseif ($status === 'inactive') {
            // Fetch documents where datenow is greater than 'active years'
            $query->where('active_years', '<', $datenow);
        } elseif ($status === 'disposal') {
            // Fetch documents where datenow is greater than 'inactive years'
            $query->where('inactive_years', '<', $datenow);
        }

        if (in_array($type, ['incoming', 'outgoing'])) {
            $query->where('type', $type);
        }

        if ($category) {
            // Add category filter to the query
            $query->where('category', $category);
        }

        if ($months) {
            // Assuming $months is in the format "Month Year", e.g., "April 2024"
            $startOfMonth = Carbon::parse($months)->startOfMonth();
            $endOfMonth = Carbon::parse($months)->endOfMonth();

            if ($weeks) {
                // Determine the start and end dates of the selected week
                switch ($weeks) {
                    case '1st Week':
                        $startOfWeek = $startOfMonth;
                        $endOfWeek = $startOfMonth->copy()->addDays(6)->endOfDay();
                        break;
                    case '2nd Week':
                        $startOfWeek = $startOfMonth->copy()->addDays(7);
                        $endOfWeek = $startOfWeek->copy()->addDays(6)->endOfDay();
                        break;
                    case '3rd Week':
                        $startOfWeek = $startOfMonth->copy()->addDays(14);
                        $endOfWeek = $startOfWeek->copy()->addDays(6)->endOfDay();
                        break;
                    case '4th Week':
                        $startOfWeek = $startOfMonth->copy()->addDays(21);
                        $endOfWeek = $startOfWeek->copy()->addDays(6)->endOfDay();
                        break;
                    default:
                        // Handle invalid week selection
                        break;
                }

                // Add date range filter to the query for the selected week
                $query->whereBetween('created_at', [$startOfWeek, $endOfWeek]);
            } else {
                // Add date range filter to the query for the whole month
                $query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);
            }
        }

        // Retrieve documents based on the constructed query
        $files = $query->whereIn('status', ['received', 'forwarded', 'accepted'])->get();

        return view('admin.records.report', [
            'files' => $files,
            'category' => $category,
            'months' => $months,
            'weeks' => $weeks,
            'grouped' => $grouped,
            'documentCounts' => $documentCounts,
        'documents' => $documents,
        
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $file = Document::find($id);
        $forwardedDocument = ForwardedDocument::where('document_id', $file->id)->get();

        return view('admin.records.edit',
         [
          'file' => $file,
          'forwardedDocument' => $forwardedDocument
        ]);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
