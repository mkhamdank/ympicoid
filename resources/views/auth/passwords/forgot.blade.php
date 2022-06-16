<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="{{ url("logo_mirai.png")}}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YMPI Information System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{ asset("css/login-style.css")}}">
  <link rel="stylesheet" href="{{ asset("css/bootstrap4.min.css")}}" id="bootstrap-css">
  <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css")}}">
  <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css")}}">

</head>
<body class="hold-transition login-page">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">

        <div class="col-md-12 col-xs-12 pl-md-5" style="margin-top: 20px">

          <span class="login100-form-title">
              <center><img src="{{url('logo_online.png')}}" style="width:200px;padding-bottom: 0px;"> </center>
            </span>

            {{ csrf_field() }}
            <span class="login100-form-title" style="color: white;background-color: #605ca8;padding-bottom: 0;text-align: center;font-size: 20px;font-weight: bold;padding: 10px;border-radius: 16px;">
              <b>Request Reset Password</b>
            </span>

            @if (session('error'))
                  <div class="alert alert-danger alert-dismissible">
                      <h4 style="font-size: 15px;font-weight: bold;"> Error!</h4>
                      <span style="font-size: 12px">{{ session('error') }}</span>
                  </div>   
              @endif
              @if (session('success'))
                  <div class="alert alert-success alert-dismissible">
                      <h4 style="font-size: 15px;font-weight: bold;"> Success!</h4>
                      <span style="font-size: 12px">{{ session('success') }}</span>
                  </div>   
              @endif
              <center>
                <span>Sistem akan mengirimkan <b style="color: red">Whatsapp Otomatis</b> ke nomor Whatsapp Anda.<br>Pastikan <b style="color: red">Nomor Whatsapp</b> Anda <b style="color: red">benar dan aktif</b>.<br><b><i>Ikuti instruksi selanjutnya</i></b> pada pesan Whatsapp.</span>
              </center>

            <div class="wrap-input100 validate-input" style="margin-top: 20px;">
              <input autocomplete="off" type="text" class="input100" placeholder="Masukkan NIK" id="employee_id" name="employee_id" required autofocus>
              <span class="focus-input100"></span>
              <span class="symbol-input100">
                <i class="fa fa-user" aria-hidden="true"></i>
              </span>
            </div>

            <div class="container-login100-form-btn">
              <button class="login100-form-btn" onclick="sendWhatsapp()">
                Send Whatsapp
              </button>
            </div>

            <div class="text-center p-t-12">
              <a class="txt2" href="{{url('')}}">
                <i class="fa fa-long-arrow-left m-l-5" aria-hidden="true"></i>
                 <b style="font-size:16px">Back To Login</b>
              </a>
            </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('js/bootstrap4.js')}}"></script>
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset("plugins/iCheck/icheck.min.js")}}"></script>
  <script>
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
      });
    });

    jQuery(document).ready(function() {
      $('#username').val('');
      $('#password').val('');
    });

    function sendWhatsapp() {
      var data = {
          employee_id : $('#employee_id').val(),
      }

      $.get('{{ url("request/reset/password") }}', data, function(result, status, xhr){
          if(result.status == true){    
              alert('Permintaan Reset Berhasil');
              window.location.replace("{{url('')}}");
          }
          else {
              alert(result.message);
          }
      })
    }
  </script>
</body>
</html>