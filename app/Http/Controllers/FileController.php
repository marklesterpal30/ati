<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentHistory;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;




class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       //
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
        $senderId = Auth::id();
        $input = $request->all();

        $filename = $request->input('file_name');
        $fileExtension = $request->file('file')->getClientOriginalExtension();
        $filename = $filename . '.' . $fileExtension;
        $filePath = $request->file('file')->storeAs('files', $filename, 'public');

        $category = $request->input('category');

        $lastDocument = Document::where('category', $category)
        ->latest('updated_at')
        ->whereNotNull('code')
        ->first();
        
     

        $lastCode = null;
        if ($lastDocument) {
            // Get the code of the last document
            $lastCode = $lastDocument->code;
        }

        $input['file'] = $filename;
        $input['sender_id'] = $senderId;
        $input['status'] = "pending";
        $input['sended_date'] = now();
        $input['recieved_by'] = 2;
        $input['type'] = 'incoming';
        $input['lastcode'] = $lastCode;
        Document::create($input);

        return redirect('/user-outgoing')->with('success', 'Your file outgoing is successful.');
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
