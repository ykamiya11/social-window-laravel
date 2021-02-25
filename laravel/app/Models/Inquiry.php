<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    //ここから追加
    protected $fillable = [
      'name',
      'email',
      'relationship',
      'content',
    ];
    //ここまで追加
}
