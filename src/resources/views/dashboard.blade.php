@extends('master')

@section('content')
    <h1>Dashboard</h1>
    <p><a href="{{ action('ClaimsController@claimForm') }}" class="btn btn-primary">Create new claim</a></p>

    <div class="row">
        @foreach ($claims as $claim)
            <div class="col-md-4">
                {{ $claim->id }}
                <a href="{{ action('ClaimsController@claimForm', ['id' => $claim->id]) }}" class="btn btn-primary btn-block">Edit</a>
            </div>
        @endforeach
    </div>
@endsection
