<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsRequest;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $posts = Post::get();
        return view('admin.posts.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::get();
        return view('admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostsRequest $request)
    {

        $input = $request->all();
        $user = Auth::user();
        if ($photo = $request->file('photo')){
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('images',$photo_name);
            $input['photo'] = $photo_name;
        }
        $input['user_id'] = $user->id;
       Post::create($input);
        return redirect('/admin/posts')->with(['success'=>'Post Published']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('admin.posts.edit',compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostsRequest $request, $id)
    {
        $post = Post::find($id);
        $input = $request->all();
        $user = Auth::user();
        if ($photo = $request->file('photo')){
            $photo_name = time() . $photo->getClientOriginalName();
            $photo->move('images',$photo_name);
            $input['photo'] = $photo_name;
        }
        $input['user_id'] = $user->id;
        $post->update($input);
        return redirect('/admin/posts')->with(['success'=>'Post Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->photo){
            unlink(public_path('images/').$post->photo);
        }
        $post->delete();
        return redirect('/admin/posts')->with(['success'=>'Post Deleted']);
    }
}
