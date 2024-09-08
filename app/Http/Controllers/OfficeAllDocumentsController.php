<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Document;
use App\Models\DocumentHistory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Purpose;



class OfficeAllDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function forwardDocuments(Request $request){
        $userId = Auth::id();

        $document = Document::where('id', $request->input('document'));
        $documenthistory = DocumentHistory::where('file', $request->input('documentname'));

         $document->update([
            'forwareded_to' => 3,
            'forwareded_by' => $userId,
            'status' => "forwarded",
        ]);

        $documenthistory->update([
            'forwareded_to' => 3,
            'forwareded_by' => $userId,
            'forwarded_date' => now(),
        ]);


        
        return redirect('/distributor-alldocuments');  
    }


    public function index(Request $request)
    {
        $userId = Auth::user()->id;
        $category = $request->input('category');
        $selectedCategory = $request->input('category');
        $month = $request->input('month');
        $day = $request->input('day');
        $selectedDay = $request->input('day');
        $selectedMonth = $request->input('month');
    
        $query = Document::query();
    
        if($category) {
            $query->where('category', $category);
        }
        if($month) {
            $query->whereMonth('created_at', $month);
            if($day) {
                $query->whereDay('created_at', $day);
            }
        }
    
        $files = $query->where('fowarded_to', $userId)
                       ->where('status', 'accepted')
                       ->where('type', 'incoming')
                       ->get();

        $purposes = Purpose::where('purpose_type', 'incoming')->get();

        $incomingCountOffice = Document::where('status', 'pending')
        ->where('recieved_by', $userId)
        ->count();
    
        return view('office.alldocuments.index', compact(
            'files',
            'selectedMonth',
            'selectedDay',
            'purposes',
            'selectedCategory',
            'incomingCountOffice'
        ));
    }
    
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $file = Document::find($id);
    
        return view('office.alldocuments.edit', compact(
            'file'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
