<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
	protected $guarded = ['id', 'user_id', 'image'];

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
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function getImageAttribute($value)
    {
        if ($value != null) {
            $path = preg_split("/\./", $value);
            $mime_type = end($path);
            return "data:image/$mime_type;base64," . base64_encode(\Storage::get($value));
        }
    }
}
