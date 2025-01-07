<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> @yield('title')</title>
    @yield('head')
</head>
<body>
    @include('layout.user.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('layout.user.footer')

    @yield('js')
</body>
</html>
