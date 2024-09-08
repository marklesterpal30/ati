<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function showCreatorProfile(){
        return view('user.profile.index');
    }
}
