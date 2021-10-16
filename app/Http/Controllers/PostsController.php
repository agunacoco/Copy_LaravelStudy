<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with("likes")->latest('updated_at')->paginate(6);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'required',
            'content'=> 'required|min:3'
        ]);
        $filename = null;
        if($request->hasFile('image')){
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $filename);
        }
        $input = array_merge($request->all(), ['user_id'=> Auth::user()->id]);
        if($filename){
            $input = array_merge($input, ['image'=> $filename]);
        }
        Post::create($input);
        
        return redirect()->route('posts.index')->with(session('session', 1));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('likes')->find($id);
        return view('posts.show', ['post'=>$post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $post = Post::find($id);

        if($request->user()->cant('update', $post)){
            abort(403);
        }
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        

        if($request->hasFile('image')){
            if($post->image){
                Storage::delete('public/images/'.$post->image);
            }
            $filename = time().'_'.$request->file('image')->getClientOriginalName();
            $path = $request->file('image')->storeAs('public/images', $filename);
            $post->image = $filename;
        }
    
        $post->save();
        return redirect()->route('posts.show', ['post'=>$post->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::find($id);

        //$this->authorize('delete', $post);
        
        if($post->image){
            // Storage 파사드의 경로는 기본적으로 storage/app 디렉토리로 설정된다.
            // 그래서 public/...으로 경로를 적어줘야한다.
            Storage::delete('public/images/'.$post->image);
        }
        $post->delete();
        return redirect()->route('posts.index');
    }

    public function deleteImage($id){
        $post = Post::find($id);
        Storage::delete('public/images/'.$post->image);
        $post->image = null;
        $post->save();

        return redirect()->route('posts.edit', ['post'=>$post->id]);
    }

}
