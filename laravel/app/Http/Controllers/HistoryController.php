<?php

namespace App\Http\Controllers;

// ここから追加
use App\Models\Inquiry;
// ここまで追加

use Illuminate\Http\Request;

class HistoryController extends Controller
{

    // ここから追加
    public function show()
    {
        $inquiries = Inquiry::orderBy('id', 'desc')->paginate(10);
        return view('history', ['inquiries' => $inquiries]);
    }
    // ここまで追加

}