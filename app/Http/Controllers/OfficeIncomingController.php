<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Mail\AcceptMail;
use Illuminate\Support\Facades\Mail;





class OfficeIncomingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function acceptDocuments(Request $request){
        $userId = Auth::id();
        $file = Document::find($request->input('id'));

        $file->update([
          'status' => 'accepted',
          'accepted_date' => now(),
          'accepted_by' => $userId,
        ]);

        // Mail::to($sendto)->send(new AcceptMail($messageContent));
        
        return redirect('/office-incoming');   
    }

    public function returnDocuments(Request $request){
        $userId = Auth::id();

        $documentid = $request->input('id');
        $documentfilename = $request->input('file_name');

       
        
        DB::table('document_histories')
        ->where('file', $documentfilename)
        ->update([
            'return_by' => $userId,
            'return_date' => now(),
        ]);

        $document = Document::find($documentid);    
        $document->update(['status' => 'return']);

        
        $files = Document::where('recipient_id', $userId)
                         ->where('status', 'pending')
                         ->get();
        
        return redirect('/distributor-incoming');   
    }

    public function index()
    {
       $userId = Auth::id();

       $incomingCountOffice = Document::where('status', 'pending')
       ->where('recieved_by', $userId)
       ->count();

       $files= Document::where('fowarded_to', $userId)
        ->where('status', 'forwarded')
        ->get();

       return view('office.incoming.index', compact(
        'files',
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


        
        return view('office.incoming.edit', compact(
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
