<?php

namespace App\Models\admin;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Txn extends Model
{
    use HasFactory;
    protected $table = 'transcation';
    protected $fillable = ['id', 'customer_id', 'amount', 'txn', 'pay_by', 'status', 'created_at', 'updated_at'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
