<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class AdminIncomingInactiveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function reportInactive($documentId){
        $document = Document::find($documentId);
        return view('admin.inactiveincoming.report', compact('document'));
    }


    public function index()
    {
        $atispecialorders = Document::where('active_years', '<', now())
        ->where('inactive_years', '>' , now())
        ->where('category', '=', 'ATI SPECIAL ORDER') // Add the operator '='
        ->get();
    

        $atimemorandumorders = Document::where('active_years', '<', now())
        ->where('inactive_years', '>' , now())
        ->where('category', '=', 'ATI MEMORANDUM ORDER') 
        ->get();

        $letters = Document::where('active_years', '<', now())
        ->where('inactive_years', '>' , now())
        ->where('category', '=', 'LETTER') 
        ->get();

        $others = Document::where('active_years', '<', now())
        ->where('inactive_years', '>' , now())
        ->where('category', '=', 'OTHERS') 
        ->get();
    
        $damemorandumorders = Document::where('active_years', '<', now())
        ->where('inactive_years', '>' , now())
        ->where('category', '=', 'DA MEMORANDUM ORDER') 
        ->get();

        $daspecialorders = Document::where('active_years', '<', now())
        ->where('inactive_years', '>' , now())
        ->where('category', '=', 'DA SPECIAL ORDER') 
        ->get();
    
        
        return view('admin.inactiveincoming.index', compact(
            'atispecialorders',
            'atimemorandumorders',
            'letters',
            'others',
            'damemorandumorders',
            'daspecialorders'
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
        //
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
