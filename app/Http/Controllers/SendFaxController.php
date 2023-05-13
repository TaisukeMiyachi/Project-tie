<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SendFaxController extends Controller
{
    public function index(Request $request){

        return view('fax.selectschool');
    }

    public function show(){

        return view('fax.faxcomplete');
    }
}
