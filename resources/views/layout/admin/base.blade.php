<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('head')
</head>
<body>
    @include('layout.admin.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('layout.admin.footer')

    @yield('js')
</body>
</html>
