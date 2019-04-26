<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subscriptions extends Model
{
    //


    protected $table="subscription";
    protected $primaryKey="id";



     public function user()
    {
        return $this->hasMany('App\User');
    }
}




