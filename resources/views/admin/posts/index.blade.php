@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 text-right">
        <a href="{{ route('admin.posts.create')}}" class="btn btn-primary">
          Crea un nuovo post
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-12">
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
                  <a href="{{ route('admin.posts.edit', ['post' => $post->id])}}" class="btn btn-warning">
                    Modifica
                  </a>
                  <form action="{{route('admin.posts.destroy', ['post' => $post->id])}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Elimina</button>
                  </form>
                </td>
              </tr>

            @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
