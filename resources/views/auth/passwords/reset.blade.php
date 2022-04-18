<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" type="image/x-icon" href="{{ url("logo_mirai.png")}}" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YMPI Information System</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- <link rel="stylesheet" href="{{ asset("css/login-style.css")}}">
  <link rel="stylesheet" href="{{ asset("css/bootstrap4.min.css")}}" id="bootstrap-css">
  <link rel="stylesheet" href="{{ asset("bower_components/font-awesome/css/font-awesome.min.css")}}">
  <link rel="stylesheet" href="{{ asset("bower_components/Ionicons/css/ionicons.min.css")}}"> -->


  <link rel="stylesheet" type="text/css" href="{{ asset('design/bootstrap.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/dashboard/css/font-awesome.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/material-design-iconic-font.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/animate.css')}}"> 
  <link rel="stylesheet" type="text/css" href="{{ asset('design/hamburgers.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/animsition.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/select2.min.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/daterangepicker.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/util.css')}}">
  <link rel="stylesheet" type="text/css" href="{{ asset('design/main.css')}}">


  <style type="text/css">
  #message {
    /*display:none;*/
    background: #f1f1f1;
    color: #000;
    position: relative;
    padding:10px 20px;
    margin:auto;
      margin-top:-20px;
  }
  #message p {
      font-size: 18px;
  }
  .valid {
      color: green;
  }
  .invalid {
      color: red;
  }
</style>

</head>

<body class="hold-transition login-page">
 <div class="limiter">
    <div class="container-login100" style="background-color:#eee">
      <div class="wrap-login100 p-t-35 p-b-20" style="padding:20px">
           <!-- p-b-70 -->
          <form id="FormDaftar" name="FormDaftar" method="post"  enctype="multipart/form-data" action="{{ url('reset/password/confirm') }}" >

            {{ csrf_field() }}
            <span class="login100-form-title" style="color: white;background-color: #605ca8;padding-bottom: 0;text-align: center;font-size: 20px;font-weight: bold;padding: 10px;border-radius: 16px;margin-top: 20px">
              <b>Reset Password</b>
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

            <ul class="login-more p-t-20">
              <div id="message">
                <h3>Password harus terdiri dari: </h3>
                <p id="letter" class="invalid"><i id="letter_fa" class="fa fa-close"></i> Memiliki <b>Huruf Kecil</b></p>
                <p id="capital" class="invalid"><i id="capital_fa" class="fa fa-close"></i> Memiliki <b>Huruf Besar</b></p>
                <p id="number" class="invalid"><i id="number_fa" class="fa fa-close"></i> Memiliki <b>Nomor</b></p>
                <p id="length" class="invalid"><i id="length_fa" class="fa fa-close"></i> Minimal <b>8 Karakter</b></p>
              </div>
            </ul>

            <input type="hidden" name="id" id="id" value="{{$id}}">
            <input type="hidden" name="validation" id="validation" value="4">

            <div class="wrap-input100 validate-input m-t-35 m-b-35" data-validate = "Enter username">
              <input autocomplete="off" type="password" class="input100" id="password" name="password" required autofocus>
              <span class="focus-input100" data-placeholder="Password. Contoh : User1234"></span>
            </div>

            <div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
              <input class="input100" type="password" id="password_confirm" name="password_confirm" required>
              <span class="focus-input100" data-placeholder="Password Confirmation"></span>
              <span id="not_match" style="display: none"></span>
            </div>

           <!--  <div class="wrap-input100 validate-input" style="margin-top: 20px;">
              <input autocomplete="off" type="password" class="input100" placeholder="Password" id="password" name="password" required autofocus>
              <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" >
              <input autocomplete="off" type="password" class="input100" placeholder="Confirm Password" id="password_confirm" name="password_confirm" required autofocus>
              <span class="focus-input100"></span>
            </div> -->


            <div class="container-login100-form-btn">
              <button type="submit" class="login100-form-btn">
                Reset Password
              </button>
            </div>


            
          </form>
          <div class="container-login100-form-btn" style="margin-top: 20px">
            <a class="login100-form-btn" style="text-decoration: none;background-color: red" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              Cancel
            </a>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
        </div>
      </div>
    </div>
  </div>

  <div id="dropDownSelect1"></div>
  <script src="{{ asset('design/jquery-3.2.1.min.js')}}"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
  <script src="{{ asset('design/animsition.min.js')}}"></script>
  <script src="{{ asset('design/popper.js')}}"></script>
  <script src="{{ asset('design/bootstrap.min.js')}}"></script>
  <script src="{{ asset('design/select2.min.js')}}"></script>
  <script src="{{ asset('design/moment.min.js')}}"></script>
  <script src="{{ asset('design/daterangepicker.js')}}"></script>
  <script src="{{ asset('design/countdowntime.js')}}"></script>
  <script src="{{ asset('design/main.js')}}"></script>
  <script type="text/javascript">
    jQuery(document).ready(function() {
      $('#validation').val(4);
      $('#password').val('');
      $('#password_confirm').val('');

      $("form").submit(function(){
        var status = 0;     
        // console.log(status);
        if (status > 0) {
          alert("Error");
          return false;
        } else{
          // this.submit();
        }
        });

    });

     
    
    $('img').on('contextmenu', function(e){ 
        return false; 
      });

    var myInput = document.getElementById("password");
    var myInputConfirm = document.getElementById("password_confirm");
    var letter = document.getElementById("letter");
    var capital = document.getElementById("capital");
    var number = document.getElementById("number");
    var length = document.getElementById("length");

    myInput.onkeyup = function() {
      // Validate lowercase letters
      checkSpell();
    }

    myInputConfirm.onkeyup = function() {
      // Validate lowercase letters
      checkSpellConfirm();
    }

    function checkSpell() {
      var lowerCaseLetters = /[a-z]/g;
      if(myInput.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
        $("#letter_fa").removeAttr("class");
        $("#letter_fa").addClass("fa fa-check-square");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
        $("#letter_fa").removeAttr("class");
        $("#letter_fa").addClass("fa fa-close");
      }
      
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInput.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
        $("#capital_fa").removeAttr("class");
        $("#capital_fa").addClass("fa fa-check-square");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
        $("#capital_fa").removeAttr("class");
        $("#capital_fa").addClass("fa fa-close");
      }
      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInput.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
        $("#number_fa").removeAttr("class");
        $("#number_fa").addClass("fa fa-check-square");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
        $("#number_fa").removeAttr("class");
        $("#number_fa").addClass("fa fa-close");
      }
      
      // Validate length
      if(myInput.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
        $("#length_fa").removeAttr("class");
        $("#length_fa").addClass("fa fa-check-square");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        $("#length_fa").removeAttr("class");
        $("#length_fa").addClass("fa fa-close");
      }
    
      checkValidation();
    }

    function checkValidation(){
      var status = 4;
      var let = $('#letter_fa').attr('class');
      var cap = $('#capital_fa').attr('class');
      var num = $('#number_fa').attr('class');
      var leg = $('#length_fa').attr('class');
      if (let == "fa fa-check-square") {
        status--;
      }
      if(cap == "fa fa-check-square"){
        status--;
      }
      if(num == "fa fa-check-square"){
        status--;
      }
      if(leg == "fa fa-check-square"){
        status--;
      }
      $("#validation").val(status);
    }

    function checkSpellConfirm() {
      var lowerCaseLetters = /[a-z]/g;
      if(myInputConfirm.value.match(lowerCaseLetters)) {  
        letter.classList.remove("invalid");
        letter.classList.add("valid");
        $("#letter_fa").removeAttr("class");
        $("#letter_fa").addClass("fa fa-check-square");
      } else {
        letter.classList.remove("valid");
        letter.classList.add("invalid");
        $("#letter_fa").removeAttr("class");
        $("#letter_fa").addClass("fa fa-close");
      }
      
      // Validate capital letters
      var upperCaseLetters = /[A-Z]/g;
      if(myInputConfirm.value.match(upperCaseLetters)) {  
        capital.classList.remove("invalid");
        capital.classList.add("valid");
        $("#capital_fa").removeAttr("class");
        $("#capital_fa").addClass("fa fa-check-square");
      } else {
        capital.classList.remove("valid");
        capital.classList.add("invalid");
        $("#capital_fa").removeAttr("class");
        $("#capital_fa").addClass("fa fa-close");
      }
      // Validate numbers
      var numbers = /[0-9]/g;
      if(myInputConfirm.value.match(numbers)) {  
        number.classList.remove("invalid");
        number.classList.add("valid");
        $("#number_fa").removeAttr("class");
        $("#number_fa").addClass("fa fa-check-square");
      } else {
        number.classList.remove("valid");
        number.classList.add("invalid");
        $("#number_fa").removeAttr("class");
        $("#number_fa").addClass("fa fa-close");
      }
      
      // Validate length
      if(myInputConfirm.value.length >= 8) {
        length.classList.remove("invalid");
        length.classList.add("valid");
        $("#length_fa").removeAttr("class");
        $("#length_fa").addClass("fa fa-check-square");
      } else {
        length.classList.remove("valid");
        length.classList.add("invalid");
        $("#length_fa").removeAttr("class");
        $("#length_fa").addClass("fa fa-close");
      }

      if (myInput.value != myInputConfirm.value) {
        $('#not_match').show();
        $('#not_match').html('Password Not Match.');
      }else{
        $('#not_match').hide();
        $('#not_match').html('');
      }
    }

   
  </script>
</body>
<!-- 
<body class="hold-transition login-page">
  <div class="limiter">
    <div class="container-login100">
      <div class="wrap-login100">

        <div class="col-md-12 col-xs-12 pl-md-5" style="margin-top: 20px">
          <center><img src="{{url('logo_yamaha.png')}}" style="width:300px;padding-bottom: 0px;"> </center>
          
      </div>
    </div>
  </div>
  <script src="{{ asset('js/bootstrap4.js')}}"></script>
  <script src="{{ asset('js/jquery.min.js')}}"></script>
  <script src="{{ asset("plugins/iCheck/icheck.min.js")}}"></script>
  <script>
    $(function () {
      $('input').iCheck({
        checkboxClass: 'icheckbox_square-blue',
        radioClass: 'iradio_square-blue',
        increaseArea: '20%'
      });
    });

    jQuery(document).ready(function() {
      $('#password_confirm').val('');
      $('#password').val('');
    });
  </script>
</body> -->
</html>