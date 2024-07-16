<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .logo-div {
            display: flex;
            align-items: center;
            text-decoration: none;
            /* Untuk menghilangkan underline pada link */
        }

        .logo-div img {
            width: 25px;
        }

        .logo-div span {
            text-decoration: none;
            font-weight: bold;
            font-size: 20px;
            text-decoration: none;
            margin-left: 10px;
            color: black;
            font-family: sans-serif;
        }

        .logo-div:hover {
            text-decoration: none;
        }
    </style>

</head>

<body id="page-top">
    <div id="wrapper">

        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <a class="logo-div" href="{{ route('homepage') }}">
                        <img src="{{ asset('img/logo/logo.png') }}" alt="logo">
                        <span>PLN Desa Suka Maju</span>
                    </a>

                    <!-- <img class="logo-homepage" src="../img/logo/logo-long.png" alt=""> -->
                    <!-- Sidebar Toggle (Topbar) -->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - User Information -->
                        <li class="nav-item no-arrow">
                            <a type="button" href="{{ route('login') }}" class="btn btn-outline-primary mr-2">Masuk</a>
                            <a type="button" href="{{ route('register') }}" class=" btn btn-primary">Daftar</a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
                <div class="container-fluid">


                </div>
            </div>
        </div>
    </div>



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>



    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>