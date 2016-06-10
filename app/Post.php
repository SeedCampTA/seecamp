<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = ['id', 'user_id'];

	protected $with = ['user', 'likeByUsers'];

	public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function likeByUsers()
    {
        return $this->belongsToMany('App\User', 'likes');
    }
}
