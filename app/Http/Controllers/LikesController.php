<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikesController extends Controller
{
    public function store($id){
        
        $post = Post::find($id);
        return $post->likes()->toggle(auth()->user());
    }
}
