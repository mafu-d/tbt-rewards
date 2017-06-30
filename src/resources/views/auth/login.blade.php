@extends('master')

@section('content')
    <h1>Log in</h1>
    <form action="{{ route('login') }}" method="post">
        {{ csrf_field() }}
        <p>
            <label for="email">Email address</label>
            <input type="email" name="email" placeholder="email@address.com" autocomplete="off" class="form-control" id="email" value="{{ old('email') }}" required autofocus>
        </p>
        <p>
            <label for="password">Password</label>
            <input type="password" name="password" class="form-control" id="password" autocomplete required>
        </p>
        <p>
            <button class="btn btn-primary" type="submit">Log in</button>
            <a class="btn btn-link" href="{{ route('password.request') }}">Forgotten your password?</a>
        </p>
    </form>
@endsection
