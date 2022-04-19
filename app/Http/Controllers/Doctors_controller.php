<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctors_model;
use Session;
class Doctors_controller extends Controller
{
    public function doctorList(){
        $data= Doctors_model::orderBy('doc_name', 'ASC')->get();
        //$data = Doctors_model::all();
        return view('doctors', ['doctorList'=>$data]);
    }
}
