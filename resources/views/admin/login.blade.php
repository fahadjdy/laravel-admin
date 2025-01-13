@extends('layout.admin.base')

@section('content')
<style>
    .form-control:focus {
        border-color: #ccc !important;
        /* Keep the default border color */
        box-shadow: none !important;
        /* Remove the glowing shadow */
    }
</style>
<section id="login">
    <div class="container d-flex justify-content-center align-items-center vh-100 bg-gradient-primary">
        <div style="width: 300px;">
            <div class="card-body">
                <form method="POST" action="{{ url('admin/kcheckLogin') }}" class="border p-4 rounded">
                    @csrf
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" placeholder="Username" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" placeholder="Password" required>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary w-50">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection