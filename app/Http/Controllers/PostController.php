<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;

class PostController extends Controller
{   
     public function __construct()
    {
        $this->middleware('auth');
    }
        
    public function index()
    {
        $posts = Post::all();
        return response()->json(['posts'=> $posts]);
    }
    public function store(Request $request)
    {

       $post = new Post;
       $post->title= $request->title;
       $post->user_id= auth()->user()->id;
       $post->desc = $request->desc;
       $post->save();

       return response()->json(['post' => $post]);
    }
    public function show()
    {
        $post = auth()->user()->post;
        return response()->json($post);
    }

     public function update(Request $request, $id)
     {  

        $post= Post::find($id);
        
        if ($post->user_id == auth()->user()->id) {
        $post->title = $request->input('title');
        $post->desc = $request->input('desc');
        $post->save();
        return response()->json(['post'=> $post, 'message' => 'Post was Successfully updated']);
        
        }else{
        return response()->json('You are not authorized');
        }
     }
     public function destroy($id)
     {
          $post= Post::find($id);
        
        if ($post->user_id == auth()->user()->id) {
            $post->delete();
            return response()->json(['message' => 'Post was Successfully deleted']);
        }else{
        return response()->json('You are not authorized');
        }
     }
}
