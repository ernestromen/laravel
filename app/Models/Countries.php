<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    use HasFactory;
    protected $fillable = ['id','user_id','name','iso'];


public function user(){
    return $this->belongsTo(User::class);
}
   
}
