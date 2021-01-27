@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form method="post" action="{{route('admin.posts.store')}}">
          @csrf
          <div class="form-group">
            <label>Titolo:</label>
            <input type="text" name="title" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Testo:</label>
            <textarea class="form-control" rows="3" name="content"></textarea>
          </div>
          <div class="form-group">
            <label>Autore:</label>
            <input type="text" name="author" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Data:</label>
            <input type="date" name="date" value="" class="form-control">
          </div>
          <button type="submit" class="btn btn-primary">Salva</button>
        </form>
      </div>
    </div>
  </div>
@endsection
