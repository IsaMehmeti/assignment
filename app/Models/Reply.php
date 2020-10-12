<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model {

	protected $fillable = ['user_id', 'reply', 'post_id'];

      public function user()
    {
 		$this->belongsTo('App\Models\User', 'user_id');
	}
	   public function post()
    {
 		$this->belongsTo('App\Models\Post', 'post_id');
	}

}