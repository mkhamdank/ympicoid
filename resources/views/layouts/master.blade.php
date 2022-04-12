<!DOCTYPE html>
<html lang="en">

  <head>

    <link rel="shortcut icon" type="image/x-icon" href="{{ url("logo_mirai.png")}}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">
    <title>MIRAI PT. YMPI</title>

    <link rel="stylesheet" type="text/css" href="{{ asset('design/dashboard/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('design/dashboard/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('design/dashboard/css/templatemo-softy-pinko.css')}}">
    <link rel="stylesheet" href="{{ url("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">
    @yield('stylesheets')
    </head>

    <body>
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    
    <script src="{{ asset('design/dashboard/js/jquery-2.1.0.min.js')}}"></script>
    <script src="{{ asset('design/dashboard/js/popper.js')}}"></script>
    <script src="{{ asset('design/dashboard/js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('design/dashboard/js/scrollreveal.min.js')}}"></script>
    <script src="{{ asset('design/dashboard/js/waypoints.min.js')}}"></script>
    <script src="{{ asset('design/dashboard/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('design/dashboard/js/imgfix.min.js')}}"></script> 
    <script src="{{ asset('design/dashboard/js/custom.js')}}"></script>
    <script src="{{ url("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
    <script type="text/javascript">
      // $('img').on('contextmenu', function(e){ 
      //     return false; 
      //   });
    </script>
  
    @yield('scripts')

  </body>
</html>