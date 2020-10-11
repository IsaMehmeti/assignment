<?php
namespace App\Models;

class UserDetails{

 protected $fillable = ['user_id', 'city', 'age'];


  public function user()
    {
 		$this->belongsTo('App\Models\User');
	}
}