<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Youtube Mini Clone</title>

    <link rel="stylesheet" href="{{asset('css/reset.css')}}">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">

    @yield('styles')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>
    <nav>
        @yield('nav')

        @guest
            <a href="{{ route('login') }}">LOGIN</a>
            <a href="{{ route('register') }}">REGISTER</a>
        @else
            <a href="#" onclick="logout(event)">
                LOGOUT
            </a>

            <form id="logout-form" action="{{ route('logout') }}"
                method="POST" style="display: none;">
                @csrf
            </form>
        @endguest

    </nav>

    <main class="py-4">
        @yield('content')
    </main>

    <script>
        function logout(event){
            event.preventDefault();
            document.getElementById('logout-form').submit();
        }
    </script>

    @yield('scripts')
</body>
</html>
