<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{

    protected $guarded = array();


    public function scopeIncomplete($query, $val)
    {
        return $query->where('complete',0)->get();
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        //figures out ID of comments
        return $this->hasMany(Comment::class);
    }
    public function addComment($body, $user_id) {

        //uses above method to add new comments
        $this->comments()->Create(compact('body', 'user_id'));
    }

}
