<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="{{ asset('author/fhd-favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    @yield('head')
</head>
<body>
    @include('layout.admin.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('layout.admin.footer')
    <script src="{{asset('admin/js/common.js')}}"></script>
    @yield('js')
    <script src="{{asset('admin/js/constant.js')}}"></script>
</body>
</html>
