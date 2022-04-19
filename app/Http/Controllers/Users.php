<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\administrator;
use Session;
use Auth;
use DB;
class Users extends Controller
{
    function list(Request $req){
        //return Session::get('logData');
        $data = administrator::all();
        return view('users_list', ['user'=>$data]);
    }

    function dashboard(Request $request){
        
        $data = administrator::all();
        return view('dashboard'); 
    }

    function create(){
        return view('create');
    }

    function loginsubmit(Request $request){

        $user = DB::table('administrator')->where(
                [['admin_email',$request->input('email')],
                ['admin_password',$request->input('password')]])->first();
        if($user){
                $request->session()->put('logData', $user);
                return redirect('/dashboard');
        }else {

            Session::flash('message', 'Please check your login details!.'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/');
        }
  
        // DB::enableQueryLog();
        // $product = administrator::get();
        // $query = DB::getQueryLog();
        // dd($query);
        // die;
       
        // return administrator::all();
    }


    public function logout(){
        Auth::logout();
        Session::flush();
        Session::flash('message', 'Log Out Successfully!.'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect('/');
    }

   
}
