<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    use HasFactory;
    protected $table = 'role_charges';
    protected $fillable = ['id', 'role_id', 'price', 'created_at', 'updated_at'];
    
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}
