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
    
        // Get the file name and extension
        $filename = $request->input('file_name');
        $fileExtension = $request->file('file')->getClientOriginalExtension();
        $filename = $filename . '.' . $fileExtension;
    
        // Store the file on the FTP server in the desired directory
        $filePath = $request->file('file')->storeAs('public/storage/files', $filename, 'ftp'); // Store in /public_html/public/storage/files
    
        // Rest of your logic remains unchanged
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
    
        // Update the input array for database insertion
        $input['file'] = $filename; // Only storing the file name in the database
        $input['sender_id'] = $senderId;
        $input['status'] = "pending";
        $input['sended_date'] = now();
        $input['recieved_by'] = 2;
        $input['type'] = 'incoming';
        $input['lastcode'] = $lastCode;
    
        // Create a new document record
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
