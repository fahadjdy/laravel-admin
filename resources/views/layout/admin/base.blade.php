<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://getbootstrap.com/docs/5.3/dist/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.7.2/css/all.css">
    <link rel="icon" href="{{ asset('author/fhd-favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/css/responsive.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    
    @yield('head')
</head>
<body>
    @include('layout.admin.header')
    
    <div class="container-fluid">
        <aside class="sidebar">
            @include('layout.admin.sidebar')
        </aside>
        <main>
            @yield('content')
        </main>
    </div>
    
    @include('layout.admin.footer')
    <script src="https://getbootstrap.com/docs/5.0/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="{{asset('admin/js/common.js')}}"></script>
    @yield('js')
    <script src="{{asset('admin/js/script.js')}}"></script>
    <script src="{{asset('admin/js/constant.js')}}"></script>

</body>
</html>
