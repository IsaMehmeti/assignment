<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $fillable = ['user_id', 'title', 'desc'];

      public function user()
    {
 		$this->belongsTo('App\Models\User', 'user_id');
	}

	 public function reply()
    {
        return $this->hasMany('App\Models\Reply');
    }
}