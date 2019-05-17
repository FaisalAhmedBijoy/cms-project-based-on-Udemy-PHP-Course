<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function admin(){
        return $this->hasOne('App\Admin','id');
    }

    public function admins(){
        return $this->hasMany('App\Admin');
    }

    public function roles(){
       // return $this->belongsToMany('App\Role');

        return $this->belongsToMany('App\Role')->withPivot('created_at');
    }


}
