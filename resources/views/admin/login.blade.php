@extends('layout.admin.base')
@section('head')
    <link rel="stylesheet" href="{{asset('admin/css/pages/login.css')}}">
@endsection

@section('content')

<section id="login">
    <div class="container d-flex justify-content-center align-items-center vh-100 bg-gradient-primary">
        <div class="card-body d-flex justify-content-center align-items-center">
            <form method="POST" action="{{ url('admin/kcheckLogin') }}" class="border p-4 rounded login-form">
                <div class="text-center mb-4">
                    <img src="{{ asset('author/fhd-favicon.png') }}" alt="Logo" class="logo" >
                </div>
                <h3 class="text-center mb-4 title">Admin Login</h3>
                @csrf
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control js-text-field" placeholder="Username" name="username" id="username" required>
                    </div>
                </div>
                <div class="mb-3">
                    <div class="input-group eye-wraper">
                        <span class="input-group-text"><i class="fas fa-lock"></i></span>
                        <input type="password" class="form-control password " placeholder="Password" name="password" id="password" required>
                        <span onclick="togglePasswordVisibility()" class="eye-toggle"><i class="fas fa-eye" id="eye-icon"></i></span>
                    </div>
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary w-50">Login</button>
                </div>
            </form>
        </div>
    </div>
</section>

@endsection

@section('js')
<script src="{{asset('admin/js/pages/login.js')}}"></script>
@endsection