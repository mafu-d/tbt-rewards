@extends('master')

@section('content')
    <h1>Reset you password</h1>
    <form action="{{ route('password.reset') }}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="token" value="{{ $token }}">
        <p>
            <label for="email">Email address</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $email or old('email') }}" required autofocus>
        </p>
        <p>
            <label for="password">New password</label>
            <input type="password" name="password" class="form-control" id="password" required>
        </p>
        <p>
            <label for="password_confirmation">Confirm password</label>
            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required>
        </p>
        <p>
            <button class="btn btn-primary" type="submit">Update password</button>
        </p>
    </form>
@endsection
