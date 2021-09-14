<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Ui\Presets\React;

class userProfileController extends Controller
{
    //show user profile page
    public function index(){
        $user_data = User::find(Auth::user() -> id);
        return view("admin.user-profile",[
            "user_data"     => $user_data,
            "social"        => json_decode($user_data -> social)
        ]);
    }

    /**
     * User Profile Update
     */

    
    public function userProfileUpdate(Request $request){

        // get user data
        $user_data = User::find(Auth::user()->id);

        $unique_name = $this -> fileUpload($request,"photo","media/users/",$user_data -> photo);

        // social profile manage

        $social = [
            "fb"    => $request -> fb,
            "tw"    => $request -> tw,
            "lin"    => $request -> lin,
            "insta"    => $request -> insta,
        ];

        $user_data       -> name = $request -> name;
        $user_data       -> email = $request -> email;
        $user_data       -> cell = $request -> cell;
        $user_data       -> username = $request -> username;
        $user_data       -> gender = $request -> gender;
        $user_data       -> bio = $request -> bio;
        $user_data       -> address = $request -> address;
        $user_data       -> social = $social;
        $user_data       -> photo = $unique_name;

        $user_data -> update();
        return redirect() -> back() -> with("success","Your Data Updated Successfull!");
    }
}
