<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InquiryController extends Controller
{
    //ここから追加
    public function index(){
        return view('index');
    }
    //ここまで追加
}
