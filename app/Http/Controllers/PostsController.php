<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB as FacadesDB;
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
        // dd(Post::all());
        // return Post::where('title', "Post 2")->get();
        // return Post::all();
        // return FacadesDB::select('SELECT * from posts');
        $posts = Post::orderBy('created_at', 'desc')->get();
        // dd($posts);
        return view('posts.index')->with('posts', $posts);

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
        $this->validate($request, [
            'title' => 'required|min:4',
            'body' => 'required|min:500',
            'cover_image' => 'nullable|max:1999'
        ]);

        //check for file upload
        if($request->hasFile('cover_image'))
        {
            // get filename with extension
            $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();
            // get just the filename
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // add timestamp
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //path to upload
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            
        }else{
            $fileNameToStore = 'noimage.jpg';
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->cover_image = $fileNameToStore;
        $post->user_id = auth()->user()->id;
        $post->save();

        return redirect('posts')->with('success', 'Post Created Successfully');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if($post->user_id !== auth()->user()->id)
        {
            return redirect('/posts')->with('error', 'Unauthorized Page');

        }
        return view('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required|min:4',
            'body' => 'required|min:500'
        ]);

        //check for file upload
        if($request->hasFile('cover_image'))
        {
            // get filename with extension
            $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();
            // get just the filename
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
            // get just the extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            // add timestamp
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;
            //path to upload
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
            
        }
        
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        if($request->hasFile('cover_image'))
        {
            $post->cover_image = $fileNameToStore;
        }
        // dd( $post);
        $post->save();

        return redirect('/posts')->with('success', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if($post->user_id !== auth()->user()->id)
        {
            return redirect('/posts')->with('error', 'Unauthorized Page');

        }

        if($post->cover_image != 'noimage.jpg')
        {
            Storage::delete('public/cover_images/'.$post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');
    }
}
