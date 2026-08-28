<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\api\Countries;

class State extends Model
{
    use HasFactory;
    protected $table = 'state';
    protected $fillable = ['id', 'country_id', 'name', 'short_name', 'created_at', 'updated_at'];

    public function country(){
        return $this->belongsTo(Countries::class, 'contry_id');
    }

}
