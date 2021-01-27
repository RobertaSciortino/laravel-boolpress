@extends('layouts.dashboard')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12">
        <form method="post">
          @csrf
          <div class="form-group">
            <label>Titolo:</label>
            <input type="text" name="" value="" class="form-control">
          </div>
          <div class="form-group">
            <label>Testo:</label>
            <textarea class="form-control" rows="3"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Salva</button>
        </form>
      </div>
    </div>
  </div>
@endsection
