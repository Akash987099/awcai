<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = ['id', 'salutation', 'name', 'email', 'phone', 'status', 'remark', 'created_at', 'updated_at'];
}
