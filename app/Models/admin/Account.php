<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;
    protected $table = 'accounts';
    protected $fillable = ['id', 'holder_name', 'bank_name', 'account_number', 'ifsc_code', 'upi', 'created_at', 'updated_at'];
}
