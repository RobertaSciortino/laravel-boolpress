<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Str;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $data = [
        'posts' => Post::all()
      ];

      return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $data = [
          'categories' => Category::all()
        ];
      return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $data = $request->all();

      $new_post = new Post();
      $new_post->fill($data);

      $slug = Str::slug($new_post->title);
      $current_post = Post::where('slug', $slug)->first();
      $slug_base = $slug;
      $counter = 1;
      while ($current_post) {
        $slug = $slug_base . '-' . $counter;
        $counter++;
        $current_post = Post::where('slug', $slug)->first();
      }
      $new_post->slug = $slug;

      $new_post->save();

      return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
      if(!$post){
        abort(404);
      }

      $data = [
        'post' => $post
      ];
      return view('admin.posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
      if(!$post){
        abort(404);
      }

      $data = [
        'post' => $post,
        'categories' => Category::all()
      ];

      return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
      $data = $request->all();

      if($data['title'] != $post->title) {
        $slug = Str::slug($data['title']);
        $current_post = Post::where('slug', $slug)->first();
        $slug_base = $slug;
        $counter = 1;
        while ($current_post) {
          $slug = $slug_base . '-' . $counter;
          $counter++;
          $current_post = Post::where('slug', $slug)->first();
        }
        $data['slug'] = $slug;
      }

      $post->update($data);

      return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
      $post->delete();

      return redirect()->route('admin.posts.index');
    }
}
