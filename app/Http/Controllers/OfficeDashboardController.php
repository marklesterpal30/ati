<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use Illuminate\Support\Facades\Auth;


class OfficeDashboardController extends Controller
{
    public function showDistributorDashboard(){
     
        $userId = Auth::id();

        $incomingCountOffice = Document::where('status', 'pending')
        ->where('recieved_by', $userId)
        ->count();
        return view('office.dashboard.index', compact(
            'incomingCountOffice'
        ));
    }
}
