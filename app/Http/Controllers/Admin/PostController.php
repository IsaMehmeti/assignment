<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{   
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function destroy($id)
     {
          $post= Post::find($id);
          $post->delete();
          return response()->json(['message'=>'Post Deleted successfully by admin']);
     }
}