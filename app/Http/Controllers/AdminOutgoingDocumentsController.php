<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Document;
use App\Models\Purpose;


class AdminOutgoingDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $month = $request->input('month');
        $selectedType = $request->input('type');
        $types = Purpose::where('purpose_type', 'outgoing')->get();
        $userId = Auth::id();
        $query = Document::query();

        if($month){
            $query->whereMonth('created_at', $month);
        }

        if($selectedType){
            $query->where('category', $selectedType);
        }

        $files = $query->where('type', 'outgoing')
        ->whereIn('status', ['received', 'forwarded'])
        ->get();

        return view('admin.outgoing.outgoingdocuments', compact(
            'files',
            'types',
            'selectedType',
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

        return view('admin.outgoing.edit', compact(
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
