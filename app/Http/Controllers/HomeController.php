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
}
