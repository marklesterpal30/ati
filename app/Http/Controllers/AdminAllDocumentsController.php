<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\ForwardedDocument;  
use App\Models\DocumentHistory;
use Illuminate\Support\Facades\Auth;

class AdminAllDocumentsController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $filesPending = Document::where('status', '=', 'pending')->get();
        $filesRecieved = Document::where('status', '=', 'recieved')->get();
        $filesforwarded = Document::where('status', '=', 'forwarded')->get();
        $filesforwarded = Document::where('status', '=', 'forwarded')->get();

        $atiSpecialOrders = [];
        // Loop through all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Construct the query for each month dynamically
            $atiSpecialOrders[$month] = Document::where('category', '=', 'ATI SPECIAL ORDER')
                ->whereMonth('recieved_date', '=', $month)
                ->whereYear('recieved_date', '=', 2024)
                ->where('active_years', '>', now())
                ->get();
        }

        $atiMemorandumOrders = [];
        // Loop through all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Construct the query for each month dynamically
            $atiMemorandumOrders[$month] = Document::where('category', '=', 'ATI MEMORANDUM ORDER')
                ->whereMonth('recieved_date', '=', $month)
                ->whereYear('recieved_date', '=', 2024)
                ->where('active_years', '>', now())
                ->get();
        }

        $letters = [];
        // Loop through all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Construct the query for each month dynamically
            $letters[$month] = Document::where('category', '=', 'LETTER')
                ->where('type', 'incoming')
                ->whereMonth('recieved_date', '=', $month)
                ->whereYear('recieved_date', '=', 2024)
                ->where('active_years', '>', now())
                ->get();
        }

        $others = [];
        // Loop through all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Construct the query for each month dynamically
            $others[$month] = Document::where('category', '=', 'OTHERS')
                ->whereMonth('recieved_date', '=', $month)
                ->whereYear('recieved_date', '=', 2024)
                ->where('active_years', '>', now())
                ->get();
        }

        $daMemorandumOrders = [];
        // Loop through all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Construct the query for each month dynamically
            $daMemorandumOrders[$month] = Document::where('category', '=', 'DA MEMORANDUM ORDER')
                ->whereMonth('recieved_date', '=', $month)
                ->whereYear('recieved_date', '=', 2024)
                ->where('active_years', '>', now())
                ->get();
        }

        $daSpecialOrders = [];
        // Loop through all 12 months
        for ($month = 1; $month <= 12; $month++) {
            // Construct the query for each month dynamically
            $daSpecialOrders[$month] = Document::where('category', '=', 'DA SPECIAL ORDER')
                ->whereMonth('recieved_date', '=', $month)
                ->whereYear('recieved_date', '=', 2024)
                ->where('active_years', '>', now())
                ->get();
        }
     
        return view('admin.alldocuments.index', compact(
            'atiSpecialOrders',
            'atiMemorandumOrders',
            'letters',
            'others',
            'daMemorandumOrders',
            'daSpecialOrders',
        ));
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


        return view('admin.alldocuments.edit', compact(
            'file',
            'forwardedDocument'
        ));
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
