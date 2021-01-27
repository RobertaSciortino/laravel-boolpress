@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1>
          {{$post->title}}
        </h1>
        <p>
          {{$post->content}}
        </p>
        <p>
          Categoria: {{$post->category ? $post->category->name : '-'}}
        </p>
      </div>
    </div>
  </div>

@endsection
