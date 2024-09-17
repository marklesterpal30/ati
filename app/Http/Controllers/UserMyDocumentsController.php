<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\DocumentHistory;
use Illuminate\Support\Facades\Auth;
use App\Models\ForwardedDocument;


class UserMyDocumentsController extends Controller
{
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

        return view('user.mydocuments.edit', compact(
            'file',
            'forwardedDocument',
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
