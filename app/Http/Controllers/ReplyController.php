<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;
use App\Models\Reply;

class ReplyController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }
    public function store(Request $request, $id)
    {	
    	$post = Post::find($id);
    	$reply = new Reply;
    	$reply->post_id = $id;
    	$reply->user_id = auth()->user()->id;
    	$reply->reply = $request->reply;
    	$reply->save();
    	return response()->json(['reply'=> $reply,'reply created for post'=> $post]);

    }
}