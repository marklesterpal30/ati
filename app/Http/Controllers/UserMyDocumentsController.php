<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentHistory;
use Illuminate\Support\Facades\Auth;



class UserMyDocumentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $status = $request->input('status');
        $userId = Auth::id();
        $query = Document::query();
   
        if ($status) {
            $query->where('status', $status)->get();
        } 

        $files = $query->where('type', 'incoming')
                ->where('sender_id', $userId)
                 ->get();

        return view('user.mydocuments.mydocuments', compact(
            'files'
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
       
        return view('user.mydocuments.edit', compact(
            'file'
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
