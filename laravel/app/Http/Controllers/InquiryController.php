<?php

namespace App\Http\Controllers;

// 追加
use App\Http\Requests\InquiryRequest;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // 追加
    public function postInquiry(InquiryRequest $request)
    {
        return 'ok';
    }
}