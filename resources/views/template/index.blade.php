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
   <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
   <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

   <!-- Custom styles for this template-->
   <link href="{{asset('css/sb-admin-2.min.css')}}" rel="stylesheet">
   @yield('css')

</head>

<body id="page-top">
   <div id="wrapper">
      @include('template.sidebar')

      <div id="content-wrapper" class="d-flex flex-column">
         <div id="content">
            @include('template.navbar')
            <div class="container-fluid">

               @yield('main')

            </div>
         </div>
         @include('template.footer')
      </div>
   </div>



   <!-- Scroll to Top Button-->
   <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
   </a>



   @include('template.modal')



   <!-- Bootstrap core JavaScript-->
   <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
   <script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

   <!-- Core plugin JavaScript-->
   <script src="{{asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

   <!-- Custom scripts for all pages-->
   <script src="{{asset('js/sb-admin-2.min.js')}}"></script>

   @yield('js')

</body>

</html>