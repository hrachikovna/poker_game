@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {!! Form::open(['route' => 'store.hands', 'method' => 'post', 'files' => true]) !!}
                    <div class="form-group">
                        {{ Form::file('hands', ['class'=>'btn btn-primary']) }}
                    </div>
                     <div class="form-group">
                         {{ Form::submit('Upload hands', ['class'=>'btn btn-primary']) }}
                     </div>
                    {!! Form::close() !!}
                        <div class="form-group">
                            <hr>
                           <h3>Player 1 Won  </h3><h4>{{ count(\App\Player::first()->winner()->get()) }} times.</h4>
                        </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
