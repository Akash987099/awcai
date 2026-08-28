<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatBot extends Model
{
    protected $table = 'chat_bot';
    protected $fillable = ['message'];
}
