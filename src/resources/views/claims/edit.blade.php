@extends('master')

@section('content')
    <h1>Edit claim</h1>
    <form action="{{ action('ClaimsController@save') }}" method="post">
        {{ csrf_field() }}
        <p>
            <label for="id">Claim ID</label>
            {{ $claim->id }}
            <input type="hidden" name="id" value="{{ $claim->id }}">
        </p>
        <p>
            <label for="company">Company you are claiming on behalf of</label>
            <input type="text" class="form-control" id="company" name="company" value="{{ $claim->company }}">
        </p>
        <p>
            <label for="address1">Address line 1</label>
            <input type="text" class="form-control" id="address1" name="address1" value="{{ $claim->address1 }}">
        </p>
        <p>
            <button class="btn btn-primary" type="submit">Save</button>
        </p>
    </form>
@endsection
