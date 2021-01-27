@extends('layouts.dashboard')

@section('content')
  <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Titolo</th>
      <th scope="col">Slug</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($posts as $post)
      <tr>
        <td>
          {{$post->id}}
        </td>
        <td>
          {{$post->title}}
        </td>
        <td>
          {{$post->slug}}
        </td>
        <td>
          <a href="{{ route('admin.posts.show', ['post' => $post->id])}}" class="btn btn-info">
            Visualizza
          </a>
          <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">
            Crea
          </a>
          <a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-primary">
            Modifica
          </a>
        </td>
      </tr>

    @endforeach

  </tbody>
</table>
@endsection
