@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form method="post" action="{{route('admin.posts.store')}}">
          @csrf
          <div class="form-group">
            <label>Titolo:</label>
            <input type="text" name="title" value="{{old('title')}}" class="form-control">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Testo:</label>
            <textarea class="form-control" rows="5" name="content" >{{old('content')}}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Autore:</label>
            <input type="text" name="author" value="{{old('author')}}" class="form-control">
            @error('author')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Data:</label>
            <input type="date" name="date" value="{{old('date')}}" class="form-control">
            @error('data')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" name="category_id">
                <option value="">-- seleziona categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{old('category_id') == $category->id ? 'selected=selected' : ''}}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
            @foreach ($tags as $tag)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$tag->id}}" {{in_array($tag->id, old('tags', [])) ? 'checked=checked' : ''}} name="tags[]">
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
