@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                  I tuoi dati
                </div>

                <div class="card-body">
                  <dl>
                    <dt>
                      Nome
                    </dt>
                    <dd>
                      {{ Auth::user()->name }}
                    </dd>
                  </dl>
                  <dl>
                    <dt>
                      Email
                    </dt>
                    <dd>
                      {{ Auth::user()->email }}
                    </dd>
                  </dl>
                  <dl>
                    <dt>
                      Api Token
                    </dt>
                    @if (Auth::user()->api_token)
                      <dd>
                        {{ Auth::user()->api_token }}
                      </dd>
                    @else
                      <button type="button" name="button" class="btn btn-primary">
                        Genera Api Token
                      </button>
                    @endif
                  </dl>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
