<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class userProfileSettingsController extends Controller
{
    //show user profile settings page
    public function index(){
        $user_data = User::find(Auth::user() -> id);
        return view("admin.user-profile-settings",[
            "user_data"     => $user_data
        ]);
    }
}
