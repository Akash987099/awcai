<?php

namespace App\Models\admin;

use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustToken extends Model
{
    use HasFactory;
    protected $table = 'customer_tokens';
    protected $fillable = ['id', 'customer_id', 'token_id', 'status', 'created_at', 'updated_at'];

    public function customer(){
        return $this->belongsTo(Customer::class, 'customer_id');
    }
    public function token(){
        return $this->belongsTo(Token::class, 'id');
    }
}
