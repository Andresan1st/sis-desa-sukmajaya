<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Response;
use PDF;
use DataTables;
use Validator;
use Auth;
class LoginController extends Controller
{
    public function index(){
        return view('auth.login');
    }
    
    // public function postlogin(Request $request){
    //     //dd($request->all());
    //     if(Auth::attempt($request->only('email','password'))){
    //         return redirect('master-category');
    //     }
    //     return redirect('/');
    // }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
