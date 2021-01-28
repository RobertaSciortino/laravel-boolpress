@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <h1 class="font-weight-bold section-title">
          Ultimi post inseriti:
        </h1>
        <ul>
          @foreach ($posts as $post)
            <li>
              <a href="{{route('post', ['slug' => $post->slug])}}" class="title-list-item">
                {{$post->title}}
              </a>
            </li>
          @endforeach
        </ul>
      </div>
    </div>
  </div>

@endsection
