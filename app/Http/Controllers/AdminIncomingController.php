<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\ForwardedDocument;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
use App\Mail\AcceptMail;
use App\Mail\ForwardDocumentsMail;
use Illuminate\Support\Facades\Mail;


class AdminIncomingController extends Controller
{
    public function approvedDocuments(Request $request){
        $userId = Auth::id();

        $recievedDocumentId = $request->input('id');
        $file = Document::find($recievedDocumentId);
        $address_from = $file->address_from;
        $code = $request->input('reference_code');
        $active_years = $request->input('active_years');
        $inactive_years = $request->input('inactive_years');

   
        $samecategoryfile = Document::where('category', $file->category)
        ->whereNull('code');

        $samecategoryfile->update([
         'lastcode' => $code
        ]);

        $file->update([
            'code' => $code,
            'recieved_date' => now(),
            'active_years' => now()->addYear($active_years) ,
            'inactive_years' => now()->addYear($active_years + $inactive_years),
            'status' => 'received',
            'stage' => 'active', 
            'lastcode' => $code,
        ]);
        
        return redirect()->back();
    }

    public function returnDocuments(Request $request){
        $userId = Auth::id();

        $file = Document::find($request->input('id'));

        $file->update([
            'status' => 'return',
            'return_by' => $userId,
            'return_date' => now(),
        ]);
        

        
        // $files = Document::where('recipient_id', $userId)
        //                  ->where('status', 'pending')
        //                  ->get();
        
        return redirect('/admin-incoming');   
    }

    public function index(Request $request)
    {
        $userId = Auth::id();
        $status = $request->input('status');
        $type = $request->input('type');
        $selectedType = $request->input('type');
        $selectedStatus = $request->input('status');
        $query = Document::query();
        $offices = User::where('role', 'office')->get();

        if ($status == 'received') {
            $query->where('status', 'received');
        } else {
            $query->where('status', 'pending');
        }

        if($type){
            $query->where('type', $type);
        }else{
            $query->where('type', 'incoming');
        }

        $files = $query->get();

        return view('admin.incoming.index', compact(
            'offices',
            'files',
            'selectedType',
            'selectedStatus'
        ));
    }

    public function forwardDocument(Request $request){
        $userId = Auth::id();

        $file = Document::find($request->input('id'));

        if($file->type == 'incoming'){
            $forwardTo = $request->input('forwardTo'); // expecting an array of office IDs

            foreach ($forwardTo as $officeId) {
                DB::table('forwarded_documents')->insert([
                    'document_id' => $file->id,
                    'forwarded_to' => $officeId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        
            $file->update([
                'fowarded_by' => $userId,
                'fowarded_date' => now(),
                'status' => 'forwarded',
                'forwarded_data' => now(),
            ]);
        }
        else{
            $outgoingemail = $file->outgoing_email;
            $filename = $file->file;
            Mail::to($outgoingemail)->send(new ForwardDocumentsMail($filename));

            $file->update([
                'fowarded_by' => $userId,
                'fowarded_date' => now(),
                'status' => 'forwarded',
            ]);
        }

        return redirect('/admin-incoming');
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

        return view('admin.incoming.edit',
         ['file' => $file,
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
