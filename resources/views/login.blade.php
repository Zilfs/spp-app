@extends('template.app')

@section('content')
    <div class="d-flex vh-100">
        <div class="col-8 d-flex flex-column h-100 justify-content-center align-items-center"
            style="background-color: #f4a261; color: #fff">
            <h1 class="fw-bold">Welcome 👋</h1>
            <img src="/images/login-image.png" alt="">
        </div>
        <div class="col-4 d-flex flex-column h-100 align-items-center">
            <h2 class="my-5 fw-bold">Log In</h2>
            <form class="user my-5 w-75" action="{{ route('login-procces') }}" method="POST">
                @csrf
                <div class="my-5"></div>
                <p class="mt-5 fs-6" style="color: gray">Please input your credential to access our dashboard</p>
                <div class="form-group">
                    <label for="username" class="mb-2 mt-5">Username</label>
                    <input type="text" class="form-control form-control-user mb-3" id="username" aria-
                        describedby="emailHelp" placeholder="your username" name="username" autofocus required
                        value="{{ old('username') }}">
                </div>
                <div class="form-group">
                    <label for="password" class="mb-2 mt-3">Password</label>
                    <input type="password" id="password" placeholder="your password" name="password"
                        class="form-control form-control-user mb-3" required>
                </div>
                <input type="submit" name="login" value="Sign In" class="btn btn-primary btn-user btn-block w-100 mt-3">
            </form>
        </div>
    </div>
@endsection


{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-
scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>Login | MyApp</title>
    <!-- Custom fonts for this template-->
    <link href="template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i

,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="template/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-dark">
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" action="{{ route('login-procces') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="username"
                                                aria- describedby="emailHelp" placeholder="Username" name="username"
                                                autofocus required value="{{ old('username') }}">



                                        </div>
                                        <div class="form-group">
                                            <input type="password" id="password" placeholder="Password" name="password"
                                                class="form-control form-control-user" required>
                                        </div>




                                        <input type="submit" name="login" value="login"
                                            class="btn btn-primary btn-user btn-block">
                                        <hr>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="template/vendor/jquery/jquery.min.js"></script>
    <script src="template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="template/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="template/js/sb-admin-2.min.js"></script>
    <script src="template/js/sweetalert2@11.js"></script>
    <script>
        @error('gagal')
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })
            Toast.fire({
                icon: 'error',
                title: 'Username atau Password Salah'
            })
        @enderror
    </script>
</body>

</html> --}}
