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
        'username',
        'password',
        'firstname',
        'lastname',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function getImageAttribute($value)
    {
        if ($value != null) {
            $path = preg_split("/\./", $value);
            $mime_type = end($path);
            return "data:image/$mime_type;base64," . base64_encode(\Storage::get($value));
        }
    }

    public function getFirstnameAttribute($value)
    {
        return ucfirst($value);
    }

    public function getLastnameAttribute($value)
    {
        return ucfirst($value);
    }
}
