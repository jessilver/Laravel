<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;

class PostController extends Controller
{
    public function create(Request $request){
        $new_post = [
            'title' => 'My frirs post',
            'content' => 'Another content',
            'author'=> 'jesse silva'
        ];

        $post = new Post($new_post);
        $post->save();

        return $post;
    }

    public function all(Request $request){
        return Post::all();
    }

    public function only(Request $request, $id){
        return Post::find($id);
    }

    public function update(Request $request, $id){
        $post = Post::find($id);
        $post->update(['title' => 'updated title','author' => 'updated author']);
        return $post->save();
    }

    public function delete(Request $request, $id ){
        $post = Post::find($id);
        return $post->delete();
    }
}
