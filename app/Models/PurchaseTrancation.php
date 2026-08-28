<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseTrancation extends Model
{
    use HasFactory;
    protected $table = 'project_transcation';
    protected $fillable = [
        'user_id',
        'project_id',
        'payment_mode',
        'amount',
        'ref_no',
        'bank',
        'remark',
        'status',
    ];
}
