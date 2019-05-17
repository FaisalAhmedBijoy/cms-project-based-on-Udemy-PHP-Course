<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    //
    use SoftDeletes;
    protected $dates=['delete_at'];
    protected $table='admin';
    protected $fillable=['title','body','name'];
}
