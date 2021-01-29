@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="font-weight-bold section-title text-capitalize">
          {{$tag->name}}
        </h1>
      @foreach ($tag->posts as $post)
        <li>
          <a href="{{route('post', ['slug' => $post->slug])}}">
            {{$post->title}}
          </a>
        </li>
      @endforeach
      </div>
    </div>
  </div>

@endsection
