<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
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

        // Mail::to($address_from)->send(new AcceptMail('Your Document is Now Recieved By ATI'));

  // function generateDocumentCode($category) {
        //     // Define prefix and increment format based on category
        //     $prefix = '';
        //     $incrementFormat = '';
            
        //     switch ($category) {
        //         case 'ATI SPECIAL ORDER':
        //             $prefix = 'AS';
        //             $incrementFormat = '3';
        //             break;
        //         case 'LETTER':
        //             $prefix = 'L';
        //             $incrementFormat = '2';
        //             break;
        //         case 'ATI MEMORANDUM ORDER':
        //             $prefix = 'AM';
        //             $incrementFormat = '3';
        //             break;
        //         case 'DA SPECIAL ORDER':
        //             $prefix = 'DS';
        //             $incrementFormat = '3';
        //             break;
        //         case 'DA MEMORANDUM ORDER':
        //             $prefix = 'DM';
        //             $incrementFormat = '3';
        //             break;
        //         case 'OTHERS':
        //             $prefix = 'O';
        //             $incrementFormat = '3';
        //             break;
        //         // Add more cases for other categories if needed
        //         default:
        //             // Default to AS prefix and 3-digit increment format
        //             $prefix = 'AS';
        //             $incrementFormat = '3';
        //             break;
        //     }
            
           
        //         // Get the count of existing documents with the same category
        //         $count = DB::table('documents')
        //         ->where('category', $category)
        //         ->whereNotNull('recieved_date')
        //         ->count();

        //     // Generate the code based on the count
        //     $code = $prefix . '_' . str_pad($count + 1, $incrementFormat, '0', STR_PAD_LEFT);
        
        //     return $code;
        // }

        // function outgoignGenerateDocumentCode($category)
        // {
        //     $year = Carbon::now()->format('y'); // Get the last two digits of the current year
        //     $month = Carbon::now()->format('m'); // Get the current month
    
        //     // Fetch the latest document code for the given category from the database
        //     $lastDocument = Document::where('category', $category)
        //                             ->latest('code')
        //                             ->first();
    
        //     $lastCode = $lastDocument ? $lastDocument->code : null;
    
        //     switch ($category) {
        //         case 'TRAVEL ORDER':
        //             $lastNumber = $lastCode ? (int) substr($lastCode, 3) : 0;
        //             $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        //             $newCode = "{$year}-{$newNumber}";
        //             break;

        //         case 'CONTRACT':
        //             $lastNumber = $lastCode ? (int) substr($lastCode, 3) : 0;
        //             $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        //             $newCode = "{$year}-{$newNumber}";
        //             break;
    
        //         case 'OB':
        //             $lastNumber = $lastCode ? (int) substr($lastCode, 6) : 0;
        //             $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        //             $newCode = "{$year}-{$month}-{$newNumber}";
        //             break;

        //         case 'LETTER':
        //             $lastNumber = $lastCode ? (int) substr($lastCode, 6) : 0;
        //             $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        //             $newCode = "{$year}-{$month}-{$newNumber}";
        //             break;

        //         case 'TRAINIGN DESIGN':
        //             $lastNumber = $lastCode ? (int) substr($lastCode, 6) : 0;
        //             $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        //             $newCode = "{$year}-{$month}-{$newNumber}";
        //             break;

        //         case 'OFFICE ORDER':
        //             $lastNumber = $lastCode ? (int) $lastCode : 0;
        //             $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        //             $newCode = "{$newNumber}";
        //             break;
    
        //         default:
        //             return response()->json(['error' => 'Invalid category'], 400);
        //     }
    
        //     // Create a new document with the generated code
         
    
        //     return $newCode;
        // }

        // $category = $file->category;

        // if($file->type == 'incoming'){
        //     $documentCode = generateDocumentCode($category); 
        // }
        // else{
        //     $documentCode = outgoignGenerateDocumentCode($category);
        // }
        
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


    /**
     * Display a listing of the resource.
     */
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
            $forwardTo = $request->input('forwardTo');

            $file->update([
                'fowarded_by' => $userId,
                'fowarded_to' => $forwardTo,
                'fowarded_date' => now(),
                'status' => 'forwarded',
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
        
        return view('admin.incoming.edit', ['file' => $file]);
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
