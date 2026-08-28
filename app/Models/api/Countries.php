<?php

namespace App\Models\api;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = ['id', 'country_name', 'country_code', 'country_short', 'currency_name', 'currency_code', 'currency_symbol', 'currency_rate', 'status', 'created_at', 'updated_at'];
}
