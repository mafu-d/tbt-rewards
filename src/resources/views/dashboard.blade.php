@extends('master')

@section('content')
    <h1>Dashboard</h1>
    <p><a href="{{ action('ClaimsController@claimForm') }}" class="btn btn-primary">Create new claim</a></p>

    <div class="row">
        @foreach ($claims as $claim)
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h4>ID: {{ $claim->id }}</h4>
                        <p><em>Last edited: {{ date('d M Y @ H:i', strtotime($claim->updated_at)) }}</em></p>
                        <p>{{ $claim->company ? 'For ' . $claim->company : '' }}</p>
                        <p>Status: {{ $claim->status() }}</p>
                        @if ($claim->status === 0 || $claim->status === 1)
                            <p><a href="{{ action('ClaimsController@claimForm', ['id' => $claim->id]) }}" class="btn btn-primary btn-block">Edit</a></p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
