<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('guest.home');
    }

    public function contatti()
    {
        return view('guest.contatti');
    }

    public function posts()
    {
      $data = [
        'posts' => Post::all()
      ];
        return view('guest.posts.index', $data);
    }

    public function post($slug)
    {
      $post = Post::where('slug', $slug)->first();
        if(!$post) {
            abort(404);
        }
        $data = ['post' => $post];
        return view('guest.posts.show', $data);
    }
}
