@extends('layouts.auth')

@section('content')
    <form method="POST" action="{{ route('login') }}">
        <h1>Login To Youtube Clone</h1>
        @csrf

        <div>
            <label for="email">E-Mail Address</label>
            <input id="email" type="email" name="email" required autofocus>

            @if ($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-group row">
            <label for="password">Password</label>

            <input id="password" type="password" name="password" required>

            @if ($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
        </div>

        <div class="form-check">
            <input name="remember" id="remember">

            <label class="form-check-label" for="remember">
                Remember Me
            </label>
        </div>

        <div>
            <button type="submit">
                Login
            </button>

            <p>
                Dont have account?

                <a href="{{ route('register') }}">
                    Register
                </a>
            </p>
        </div>
    </form>
@endsection
