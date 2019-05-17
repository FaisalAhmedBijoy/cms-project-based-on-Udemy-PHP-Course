<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model

{
    //

    public  function  admins(){
        return $this->hasManyThrough('App\Admin','App\User');
    }
}
