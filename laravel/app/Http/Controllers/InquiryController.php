<?php

namespace App\Http\Controllers;

use App\Http\Requests\InquiryRequest;
use App\Mail\InquiryMail;

//ここから追加
use App\Models\Inquiry;
//ここまで追加

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
        
        if(is_null($sessionData)){
            return redirect(route('index'));
        }

        $message = view('emails.inquiry', $sessionData);
        return view('confirm', ['message' => $message]);
    }
    
    public function postConfirm(Request $request){
        $sessionData = $request->session()->get('inquiry');
        
        if(is_null($sessionData)){
            return redirect(route('index'));
        }

        $request->session()->forget('inquiry');
        
        //ここから追加
        Inquiry::create($sessionData);
        //ここまで追加
        
        Mail::to($sessionData['email'])->send(new InquiryMail($sessionData));

        return redirect(route('sent'))->with('sent_inquiry', true);
    }
    public function showSentMessage(Request $request)
    {
        $request->session()->keep('sent_inquiry');
        $sessionData = $request->session()->get('sent_inquiry');
        if (is_null($sessionData)) {
            return redirect(route('index'));
        }

        return view('sent');
    }
}