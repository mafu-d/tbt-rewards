@extends('master')

@section('content')
    <h1>Administration</h1>
    <p><a href="{{ action('ClaimsController@downloadClaims') }}" class="btn btn-primary">Download all claims</a></p>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Submitted by</th>
                <th>Company</th>
                <th>Updated</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($claims as $claim)
                <tr>
                    <td>{{ $claim->id }}</td>
                    <td>{{ $claim->user->name }}</td>
                    <td>{{ $claim->company }}</td>
                    <td>{{ $claim->updated_at }}</td>
                    <td>{{ $claim->status() }}</td>
                    <td><a href="{{ action('ClaimsController@view', ['id' => $claim->id]) }}" class="btn btn-primary">View details</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
