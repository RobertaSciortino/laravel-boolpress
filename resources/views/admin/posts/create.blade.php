@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="post" action="{{route('admin.posts.store')}}">
          @csrf
          <div class="form-group">
            <label>Titolo:</label>
            <input type="text" name="title" value="" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Testo:</label>
            <textarea class="form-control" rows="5" name="content" required></textarea>
          </div>
          <div class="form-group">
            <label>Autore:</label>
            <input type="text" name="author" value="" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Data:</label>
            <input type="date" name="date" value="" class="form-control" required>
          </div>
          <div class="form-group">
            <label>Categoria</label>
            <select class="form-control" name="category_id">
                <option value="">-- seleziona categoria --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
          </div>
            @foreach ($tags as $tag)
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{$tag->id}}" name="tags[]">
                <label class="form-check-label" for="defaultCheck1">
                  {{$tag->name}}
                </label>
              </div>
            @endforeach
          <button type="submit" class="btn btn-primary">Salva</button>
        </form>
      </div>
    </div>
  </div>
@endsection
