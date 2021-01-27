@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form method="post" action="{{route('admin.posts.update', ['post' => $post->id])}}">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Titolo:</label>
            <input type="text" name="title" value="{{$post->title}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Testo:</label>
            <textarea class="form-control" rows="3" name="content">{{$post->content}}</textarea>
          </div>
          <div class="form-group">
            <label>Autore:</label>
            <input type="text" name="author" value="{{$post->author}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Data:</label>
            <input type="date" name="date" value="{{$post->date}}" class="form-control">
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" name="category_id">
                <option value="">-- seleziona categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected=selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
          <button type="submit" class="btn btn-primary">Salva</button>
        </form>
      </div>
    </div>
  </div>
@endsection
