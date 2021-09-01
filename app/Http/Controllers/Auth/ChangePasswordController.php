<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //show change pass form
    public function index(){
        return view("admin.password_change");
    }

    //Change Password
    public function changePass(Request $request){
        //validation
        $this -> validate($request,[
            "old_pass"     => "required",
            "password"     => ["required","min:5","confirmed"],
        ]);

        //check old pass

        if(password_verify($request -> old_pass,Auth::user() -> password)){
            $user_data = User::find(Auth::user() -> id);
            $user_data   -> password = Hash::make($request -> password);
            $user_data -> update();
            Auth::logout();
            return redirect()->route("login");
        }else{
            return back() -> with("warning","Old password did not match");
        }
    }
}
