<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Mail\InquiryMail; //追加
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail; //追加

class InquiryController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function postInquiry(InquiryRequest $request)
    {
        $validated = $request->validated();
        $request->session()->put('inquiry', $validated);
        return redirect(route('confirm'));
    }
    
    public function showConfirm(Request $request){
        //ここから編集
        $sessionData = $request->session()->get('inquiry');
        $message = view('emails.inquiry', $sessionData);
        return view('confirm', ['message' => $message]);
        //ここまで編集
    }
    
    public function postConfirm(Request $request){
        //ここから追加
        $sessionData = $request->session()->get('inquiry');
        $request->session()->forget('inquiry');
        
        Mail::to($sessionData['email'])->send(new InquiryMail($sessionData));
        //ここまで追加
        return redirect(route('sent'));
    }
    
    public function showSentMessage(){
        return view('sent');
    }
}