<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Areas extends Model
{
    protected $table = 'areas';

    protected $fillable = [
       'id','name','code','created_at','updated_at'
    ];
}
