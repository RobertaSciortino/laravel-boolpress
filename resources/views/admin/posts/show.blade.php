@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="font-weight-bold">
          {{$post->title}}
        </h1>
        <p class="content">
          {{$post->content}}
        </p>
        <p class="text-uppercase">
          Categoria: {{$post->category ? $post->category->name : '-'}}
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
  </div>

@endsection
