@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('register') }}">
        <h1>Register</h1>

        @csrf

        <div>
            <label for="name">Name</label>

            <input id="name" type="text" name="name" required autofocus>

            @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </span>
            @endif
        </div>
        <br />

        <div>
            <label for="email">E-Mail Address</label>

            <input id="email" type="email" name="email" required>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>
        <br />

        <div class="form-group row">
            <label for="password">Password</label>

            <input id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>
        <br />

        <div class="form-group row">
            <label for="password-confirm">Confirm Password</label>
            <input id="password-confirm" type="password" name="password_confirmation" required>
        </div>
        <br />

        <div>
            <button type="submit">
                Register
            </button>

            <p>
                Already have an account?

                <a href="{{ route('login') }}">
                    Login
                </a>
            </p>
        </div>
    </form>
@endsection
