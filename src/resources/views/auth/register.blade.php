@extends('master')

@section('content')
    <h1>Register</h1>
    <form action="{{ route('register') }}" method="post">
        {{ csrf_field() }}
        <p>
            <label for="name">Your name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required autofocus>
        </p>
        <p>
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </p>
        <p>
            <label for="password_confirmation">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </p>
        <p>
            <button class="btn btn-primary" type="submit">Register</button>
        </p>
    </form>
@endsection
