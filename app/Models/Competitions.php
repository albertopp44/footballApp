<?php

namespace App\Models;
    
use Illuminate\Database\Eloquent\Model;


class Competitions extends Model
{
    /* This modal is going to be used to handle the store of competitions in our DB.*/
    protected $table = 'competitions';

    protected $fillable = [
       'id','name','logo','country_id','created_at','updated_at'
    ];

}