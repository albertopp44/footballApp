<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Summary of Players
 */
class Players extends Model
{
    /**
     * Summary of table
     * @var string
     */
    protected $table = 'players';

    /**
     * Summary of fillable
     * @var array
     */
    protected $fillable = [
       'id','name','image','number','type','age','created_at','updated_at'
    ];
}
