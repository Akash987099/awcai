<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\admin\Role;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'id',
        'name',
        'role_id',
        'user_name',
        'mobile',
        'telephone',
        'email',
        'password',
        'address',
        'pincode',
        'city',
        'shop_name',
        'shop_address',
        'shop_pincode',
        'shop_city',
        'profile',
        'category',
        'sub_category',
        'created_by',
        'status',
        'api_key',
        'pay_status',
    ];

    public function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }
}
