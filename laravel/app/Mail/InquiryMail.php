<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InquiryMail extends Mailable
{
    use Queueable, SerializesModels;
    
    //ここから追加
    public $email;
    public $name;
    public $relationship;
    public $content;
    //ここまで追加

    /**
     * Create a new message instance.
     *
     * @return void
     */
    //ここから編集
    public function __construct(array $data)
    {
        foreach($data as $key => $value){
            $this->{$key} = $value;
        }
    }
    //ここまで編集
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //ここから編集
        return $this->subject($this->name.'さんにお知らせがあります')->text('emails.inquiry');
        //ここまで編集
    }
}
