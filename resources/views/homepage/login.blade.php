<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .card-title {
            color: black;
            font-size: 2rem;
            font-weight: bold;
        }

        .card-nav {
            color: black;
            border-bottom: 1px solid rgba(10, 6, 244, 1);
        }

        .bg-login {
            background-image: url('img/bg/bglogin.png');
            background-repeat: no-repeat;
        }
    </style>

</head>

<body class="bg-login">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-6 col-lg-7 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5 ">

                    <div class="card-header pb-0 px-4 pt-4">
                        <h4 class="card-title">Login</h4>
                        <div class="d-flex ">
                            <p class="mr-3 mb-0 pb-1 card-nav">Masuk</p>
                        </div>

                        <!-- <p class="card-subtitle">Masuk atau Daftar</p> -->
                    </div>
                    <div class="card-body px-4">
                        <!-- Form untuk masuk -->
                        <form action="{{ route('actionlogin') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required placeholder="Masukkan email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required placeholder="Masukkan password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('password.request') }}" class="float-right">Lupa Kata Sandi?</a>
                            </div>
                            <div class="form-group mt-4">
                                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
                                <a href="{{ route('homepage') }}" class="btn btn-outline-primary btn-block mt-2">Batal</a>
                            </div>
                        </form>

                        <!-- Link untuk daftar -->
                        <p class="text-center mt-3">Belum daftar? <a href="{{ route('register') }}">Buat Akun</a></p>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>