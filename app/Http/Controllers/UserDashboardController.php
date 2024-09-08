<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;

class UserDashboardController extends Controller
{
    public function showCreatorDashboard(){
        $pendingDocumentsCount = Document::where('status', 'pending')->count();
        $recievedDocumentsCount = Document::where('status', 'recieved')->count();
        $forwardedDocumentsCount = Document::where('status', 'forwarded')->count();
        $acceptedDocumentsCount = Document::where('status', 'accepted')->count();
        $returnedDocumentsCount = Document::where('status', 'return')->count();

        $documentsCountByMonth = Document::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->groupBy('month')
        ->get();

        // Initialize arrays for all 12 months
        $months = [];
        $counts = [];

        // Fill arrays with counts for each month
        for ($i = 1; $i <= 12; $i++) {
            $months[] = date('F', mktime(0, 0, 0, $i, 1));
            $counts[] = $documentsCountByMonth->where('month', $i)->first()->count ?? 0;
        }

        return view('user.dashboard.index', compact(
         'months',
         'counts',
         'pendingDocumentsCount',
         'recievedDocumentsCount',
         'forwardedDocumentsCount',
         'acceptedDocumentsCount',
         'returnedDocumentsCount',   
        ));
    }
}
