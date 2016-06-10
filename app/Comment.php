<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
	protected $guarded = ['id', 'post_id'];

	protected $with = ['user'];
	
	public function user()
    {
        return $this->belongsTo('App\User');
    }
}
