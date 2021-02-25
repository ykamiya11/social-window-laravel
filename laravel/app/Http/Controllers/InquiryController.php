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
        //ここから編集
        $validated = $request->validated();
        $request->session()->put('inquiry', $validated);
        return redirect(route('confirm'));
        //ここまで編集
    }
    
    //ここから追加
    public function showConfirm(Request $request){
        dd($request->session()->get('inquiry'));
    }
    //ここまで追加
}