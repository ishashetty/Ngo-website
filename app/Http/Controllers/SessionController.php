<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class SessionController extends Controller
{
    public function logout(Request $request){
        if(session('email')){
            $request->session()->flush();
            return redirect('/')->with('success','Logged out Successfully!');
        }
        return redirect()->back()->with('error',str_rot13('Error Message !'));
        
    }

}
