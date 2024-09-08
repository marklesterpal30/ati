<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentHistory;
use Illuminate\Support\Facades\Auth;



class AdminAllDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

        return view('admin.alldocuments.edit', compact(
            'file',
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
