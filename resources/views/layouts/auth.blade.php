<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Youtube Mini Clone</title>
</head>
<body>
    <main class="py-4">
        @yield('content')
    </main>
</body>
</html>
