<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //gets rid of mass assignment
    protected $guarded = array();

    function post() {

        return $this->belongsTo(task::class);
    }

    function user() {

        return $this->belongsTo(user::class);
    }
}
