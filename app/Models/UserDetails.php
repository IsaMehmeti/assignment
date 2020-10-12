<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{

 protected $fillable = ['user_id', 'city', 'age'];


  public function user()
    {
 		$this->belongsTo('App\Models\User', 'user_id');
	}
}