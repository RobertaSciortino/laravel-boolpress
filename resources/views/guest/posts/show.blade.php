@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 class="font-weight-bold section-title">
          {{$post->title}}
        </h1>
        <p class="content title-list-item">
          {{$post->content}}
        </p>
        <p>
          Categoria:
          <span class="text-uppercase category">
            @if ($post->category)
              <a href="{{ route('categories.show', ['slug' => $post->category->slug])}}">
                {{ $post->category->name }}
              </a>
            @else
              -
            @endif
          </span>
        </p>
        <p>
          Tags:
          <span class="text-uppercase category">
            @forelse ($post->tags as $tag)
              {{ $tag->name }}{{ !$loop->last ? ',' : ''}}
            @empty
              -
            @endforelse
          </span>
        </p>
      </div>
    </div>
    <div class="row">
      <div class="offset-4 col-1">
        <a href="{{route('posts')}}" class="btn btn-light">
          <i class="fas fa-angle-double-left fa-2x"></i>
        </a>
      </div>
      <div class="col-2 text-center">
        <a href="{{route('posts')}}" class="btn btn-light">
          Indietro
        </a>
      </div>
      <div class="col-1">
        <a href="{{route('posts')}}" class="btn btn-light">
          <i class="fas fa-angle-double-right fa-2x"></i>
        </a>
      </div>
    </div>
  </div>

@endsection
