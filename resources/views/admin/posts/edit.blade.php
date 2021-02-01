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
            <input type="text" name="title" value="{{old('title', $post->title)}}" class="form-control">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Testo:</label>
            <textarea class="form-control" rows="3" name="content">{{old('content', $post->content)}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Autore:</label>
            <input type="text" name="author" value="{{old('author', $post->author)}}" class="form-control">
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Data:</label>
            <input type="date" name="date" value="{{old('date', $post->date)}}" class="form-control">
            @error('data')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" name="category_id">
                <option value="">-- seleziona categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == old('category_id', $post->category_id) ? 'selected=selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            @foreach ($tags as $tag)
              <div class="form-check">
                @if ($errors->any())
                  <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]" {{in_array($tag->id, old('tags', [])) ? 'checked=checked' : ''}}>
                @else
                  <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]" {{$post->tags->contains($tag) ? 'checked=checked' : ''}}>
                @endif
                <label class="form-check-label" for="defaultCheck1">
                  {{$tag->name}}
                </label>
              </div>
            @endforeach
            @error('tags')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          <button type="submit" class="btn btn-primary">Salva</button>
        </form>
      </div>
    </div>
  </div>
@endsection
