@extends('master')

@section('content')
    <h1>Reset your password</h1>
    <form action="{{ route('password.email') }}" method="post">
        {{ csrf_field() }}
        <p>
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" required autofocus>
        </p>
        <p>
            <button class="btn btn-primary" type="submit">Send reset email</button>
        </p>
    </form>
@endsection
