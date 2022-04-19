<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\administrator;
use Session;
class Registration extends Controller
{
    //

    public function delete(Request $request){

        $user_id = $request->input('deletid');
        $user = administrator::find($user_id);
        $result = $user->delete();
        if ($result) {

            Session::flash('message', 'User deleted successfull.'); 
            Session::flash('alert-class', 'alert-success'); 
        }else {
            Session::flash('message', 'Oops Something went wrong.'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->back();
    }

    public function register(Request $req){

        $this->validate($req,[
            'admin_name' => 'required',
            'admin_email' => 'required|email|unique:administrator',
            'admin_mobile' => 'required',
            'admin_password' => 'required'
        ],
        [
            'admin_name.required' => 'Name is required',
            'admin_password.required' => 'Password is required',
            'admin_email.required' =>'Email is required',
            'admin_email.unique'=>'Email id allready registered'
        ]);
          
        $user = new administrator;
        $user->admin_name = $_POST['admin_name'];
        $user->admin_email = $_POST['admin_email'];
        $user->admin_mobile = $_POST['admin_mobile'];
        $user->admin_password = $_POST['admin_password'];

        // $user->email_code = $req->emailCode;
        // $user->status = $req->status;
        $user->modified_on = date('Y-m-d H:i:s');
        $user->access_all = '1';
        $result = $user->save();
        if ($result) {

            Session::flash('message', 'Registered Successfully'); 
            Session::flash('alert-class', 'alert-success'); 
            return redirect('/create');
            
            //return redirect('/create');
        }else{

            Session::flash('message', 'Somwthing went wrong'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('/create');
        }
       
    }

 function update(Request $request, $id){

        $this->validate($request,[
            'admin_name' => 'required',
            'admin_email' => 'required|email',
            'admin_mobile' => 'required'
        ],
        [
            'admin_name.required' => 'Name is required',
            'admin_password.required' => 'Password is required',
            'admin_email.required' =>'Email is required'
        ]);

        $user = administrator::find($id);

        $user->admin_name = $_POST['admin_name'];
        $user->admin_email = $_POST['admin_email'];
        $user->admin_mobile = $_POST['admin_mobile'];
        
        $result = $user->save();
        
        if ($result) {

            Session::flash('message', 'Data Updated successfull.'); 
            Session::flash('alert-class', 'alert-success'); 
        }else {
            Session::flash('message', 'Oops Something went wrong.'); 
            Session::flash('alert-class', 'alert-danger'); 
        }
        
        return redirect()->back();
      
    }
}
