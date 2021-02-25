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
        
        $sessionData = $request->session()->get('inquiry');
        
        //ここから追加
        if(is_null($sessionData)){
            return redirect(route('index'));
        }
        //ここまで追加
        
        $message = view('emails.inquiry', $sessionData);
        return view('confirm', ['message' => $message]);
        //ここまで編集
    }
    
    public function postConfirm(Request $request){
        //ここから追加
        $sessionData = $request->session()->get('inquiry');
        
        //ここから追加
        if(is_null($sessionData)){
            return redirect(route('index'));
        }
        //ここまで追加
        
        $request->session()->forget('inquiry');
        
        Mail::to($sessionData['email'])->send(new InquiryMail($sessionData));
        //ここまで追加
        
        //ここから編集
        return redirect(route('sent')->with('sent_inquiry'. true));
        //ここまで編集
    }
    // 引数に Request $request を追加
    public function showSentMessage(Request $request)
    {
        // ここから追加
        $request->session()->keep('sent_inquiry');
        $sessionData = $request->session()->get('sent_inquiry');
        if (is_null($sessionData)) {
            return redirect(route('index'));
        }
        // ここまで追加

        return view('sent');
    }
}