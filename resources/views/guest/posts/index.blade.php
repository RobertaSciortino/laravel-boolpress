@extends('layouts.dashboard')

@section('content')
  <h1>
    Ultimi post inseriti:
  </h1>
  <ul>
    @foreach ($posts as $post)
      <li>
        {{$post->title}}
      </li>
    @endforeach
  </ul>

@endsection
