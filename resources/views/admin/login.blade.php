

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login </title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="icon" href="{{ asset('author/fhd-favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{asset('admin/css/pages/login.css')}}">
</head>
<body>
   
    
<section id="login">
    <div class="container d-flex justify-content-center align-items-center vh-100 bg-gradient-primary">
        <div class="card-body d-flex justify-content-center align-items-center">
            <form  class="border p-4 rounded login-form" id="loginForm">
                @method('post')
                <div class="text-center mb-4">
                    <img src="{{ asset('author/fhd-favicon.png') }}" alt="Logo" class="logo" >
                </div>
                <h3 class="text-center mb-4 title">Admin Login</h3>
                @csrf
                <div class="mb-3">
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                        <input type="text" class="form-control" placeholder="Username" name="username" id="username" required>
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
    
    <script src="{{asset('admin/js/pages/login.js')}}"></script>   
    <script src="{{asset('admin/js/common.js')}}"></script>
    <script src="{{asset('admin/js/constant.js')}}"></script>
</body>
</html>







