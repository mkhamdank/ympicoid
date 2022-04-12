<!DOCTYPE html>
<html lang="">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Yamaha Day Competition (YMPI) Registration</title>
	<link rel="shortcut icon" type="image/x-icon" href="{{ url('logo_mirai_bundar.png')}}" />

	<link rel="stylesheet" type="text/css" href="{{ url('vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/animate/animate.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/css-hamburgers/hamburgers.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/animsition/css/animsition.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/select2/select2.min.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('vendor/daterangepicker/daterangepicker.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/main.css')}}">
	<link rel="stylesheet" type="text/css" href="{{ url('css/jquery.gritter.css') }}" >
	<link rel="stylesheet" href="{{ url('bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">

	<style type="text/css">

		@font-face {
			font-family: Raleway-SemiBold;
			src: url('../fonts/raleway/Raleway-SemiBold.ttf'); 
		}

		@font-face {
			font-family: Raleway-Bold;
			src: url('../fonts/raleway/Raleway-Bold.ttf'); 
		}

		@font-face {
			font-family: Raleway-Black;
			src: url('../fonts/raleway/Raleway-Black.ttf'); 
		}

		.radio {
			display: inline-block;
			position: relative;
			padding-left: 35px;
			margin-bottom: 12px;
			cursor: pointer;
			font-size: 16px;
			-webkit-user-select: none;
			-moz-user-select: none;
			-ms-user-select: none;
			user-select: none;
		}

		/* Hide the browser's default radio button */
		.radio input {
			position: absolute;
			opacity: 0;
			cursor: pointer;
		}

		/* Create a custom radio button */
		.checkmark {
			position: absolute;
			top: 0;
			left: 0;
			height: 25px;
			width: 25px;
			background-color: #ccc;
			border-radius: 50%;
		}

		/* On mouse-over, add a grey background color */
		.radio:hover input ~ .checkmark {
			background-color: #ccc;
		}

		/* When the radio button is checked, add a blue background */
		.radio input:checked ~ .checkmark {
			background-color: #2196F3;
		}

		/* Create the indicator (the dot/circle - hidden when not checked) */
		.checkmark:after {
			content: "";
			position: absolute;
			display: none;
		}

		/* Show the indicator (dot/circle) when checked */
		.radio input:checked ~ .checkmark:after {
			display: block;
		}

		/* Style the indicator (dot/circle) */
		.radio .checkmark:after {
			top: 9px;
			left: 9px;
			width: 8px;
			height: 8px;
			border-radius: 50%;
			background: white;
		}

	</style>
</head>

<body>
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<div id="loading" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(0,191,255); z-index: 30001; opacity: 0.8; display: none">
		<p style="position: absolute; color: White; top: 45%; left: 35%;">
			<span style="font-size: 20px">Loading, mohon tunggu . . . <i class="fa fa-spin fa-refresh"></i></span>
		</p>
	</div>

	<div class="container-contact100">
		<div class="wrap-contact100" id="form_buat">
				<center><span class="contact100-form-title" style="padding-bottom: 5px;text-align: center;font-weight: bold;">
					Yamaha Day Competition (YMPI) Registration
				</span></center>

				<br>

				<!-- <span>Form ini merupakan media untuk mengumpulkan data dari karyawan YMPI yang telah menginstal aplikasi Peduli Lindungi di Smartphone.</span><br>
				<span style="color: red;font-weight: bold;">Karyawan yang wajib mengisi form ini adalah yang sudah menginstal aplikasi Peduli Lindungi.</span> -->
				<input type="hidden" value="{{csrf_token()}}" name="_token" />
				<label class="label-input1002">Game Category <span style="color:red">*</span></label>

				<select id="category" class="form-control" onchange="changeCategory()" name="category">
					<option value="">Pilih Category</option>
					<option value="Mobile Legends">Mobile Legends</option>
					<option value="PUBG">PUBG</option>
					<option value="YMPI QUIZ">YMPI QUIZ</option>
				</select>

				<div id="mobilelegend">
					<center><label class="label-input1002" style="font-weight: bold;font-size:20px;background-color: orange;padding: 3px;color: white">Mobile Legends</label></center>
					<label class="label-input1002">Nama Tim <span style="color:red">*</span></label>
					<input type="text" class="form-control" id="team_name_ml" name="team_name_ml" placeholder="Masukkan Nama Tim">

					<label class="label-input1002">No. HP Ketua Tim <span style="color:red">*</span></label>
					<input type="text" class="form-control" id="phone_no_ml" name="team_name_ml" placeholder="Masukkan No. HP Ketua Tim">

					<?php for ($i=1; $i <= 5; $i++) {  ?>
						<?php if ($i == 1){ ?>
							<label class="label-input1002">Player {{$i}} (Ketua Tim)<span style="color:red">*</span></label>
						<?php }else{ ?>
							<label class="label-input1002">Player {{$i}}<span style="color:red">*</span></label>
						<?php } ?>
						<div class="col-xs-6">
							<input type="text" class="form-control" id="player_ml_{{$i}}" name="player_ml_{{$i}}" placeholder="Masukkan NIK Player {{$i}}" onkeyup="checkEmp(this.value,'{{$i}}')">
						</div>
						<div class="col-xs-6" style="margin-top: 3px">
							<input type="text" class="form-control" id="name_ml_{{$i}}" name="name_ml_{{$i}}" placeholder="Nama Player {{$i}}" readonly="">
						</div>
					<?php } ?>

					<!-- <label class="label-input1002">Player Cadangan (Optional) <span style="color:red">*</span></label>
					<div class="col-xs-6">
						<input type="text" class="form-control" id="player_ml_6" name="player_ml_6" placeholder="Masukkan NIK Player Cadangan" onkeyup="checkEmp(this.value,'6')">
					</div>
					<div class="col-xs-6" style="margin-top: 3px">
						<input type="text" class="form-control" id="name_ml_6" name="name_ml_6" placeholder="Nama Player Cadangan" readonly="">
					</div> -->
				</div>

				<div id="pubg">
					<center><label class="label-input1002" style="font-weight: bold;font-size:20px;background-color: #2163a6;padding: 3px;color: white">PUBG</label></center>
					<label class="label-input1002">Team Name <span style="color:red">*</span></label>
					<input type="text" class="form-control" id="team_name_pubg" name="team_name_pubg" placeholder="Masukkan Nama Tim">

					<label class="label-input1002">No. HP Ketua Tim <span style="color:red">*</span></label>
					<input type="text" class="form-control" id="phone_no_pubg" name="team_name_pubg" placeholder="Masukkan No. HP Ketua Tim">

					<?php for ($i=1; $i <= 4; $i++) {  ?>
						<?php if ($i == 1){ ?>
							<label class="label-input1002">Player {{$i}} (Ketua Tim)<span style="color:red">*</span></label>
						<?php }else{ ?>
							<label class="label-input1002">Player {{$i}}<span style="color:red">*</span></label>
						<?php } ?>
						<div class="col-xs-6">
							<input type="text" class="form-control" id="player_pubg_{{$i}}" name="player_pubg_{{$i}}" placeholder="Masukkan NIK Player {{$i}}" onkeyup="checkEmp(this.value,'{{$i}}')">
						</div>
						<div class="col-xs-6" style="margin-top: 3px">
							<input type="text" class="form-control" id="name_pubg_{{$i}}" name="name_pubg_{{$i}}" placeholder="Nama Player {{$i}}" readonly="">
						</div>
					<?php } ?>
				</div>

				<div id="cc">
					<center><label class="label-input1002" style="font-weight: bold;font-size:20px;background-color: #e436ff;padding: 3px;color: white">YMPI QUIZ</label></center>
					<label class="label-input1002">Team Name <span style="color:red">*</span></label>
					<input type="text" class="form-control" id="team_name_cc" name="team_name_cc" placeholder="Masukkan Nama Tim">

					<label class="label-input1002">No. HP Ketua Tim <span style="color:red">*</span></label>
					<input type="text" class="form-control" id="phone_no_cc" name="team_name_cc" placeholder="Masukkan No. HP Ketua Tim">

					<?php for ($i=1; $i <= 3; $i++) {  ?>
						<?php if ($i == 1){ ?>
							<label class="label-input1002">Peserta {{$i}} (Ketua Tim)<span style="color:red">*</span></label>
						<?php }else{ ?>
							<label class="label-input1002">Peserta {{$i}}<span style="color:red">*</span></label>
						<?php } ?>
						<div class="col-xs-6">
							<input type="text" class="form-control" id="player_cc_{{$i}}" name="player_cc_{{$i}}" placeholder="Masukkan NIK Peserta {{$i}}" onkeyup="checkEmp(this.value,'{{$i}}')">
						</div>
						<div class="col-xs-6" style="margin-top: 3px">
							<input type="text" class="form-control" id="name_cc_{{$i}}" name="name_cc_{{$i}}" placeholder="Nama Peserta {{$i}}" readonly="">
						</div>
					<?php } ?>

					<label class="label-input1002">Peserta Cadangan (Optional) <span style="color:red">*</span></label>
					<div class="col-xs-6">
							<input type="text" class="form-control" id="player_cc_4" name="player_cc_4" placeholder="Masukkan NIK Peserta Cadangan" onkeyup="checkEmp(this.value,'4')">
						</div>
						<div class="col-xs-6" style="margin-top: 3px">
							<input type="text" class="form-control" id="name_cc_4" name="name_cc_4" placeholder="Nama Peserta Cadangan" readonly="">
						</div>
				</div>
				
				<!-- demam, batuk, kejadian, tenggorokan sakit, sesak nafas, indera perasa & penciuman terganggu,  -->
			
				<div class="container-contact100-form-btn" style="margin-top: 20px">
					<button class="contact100-form-btn btn-block" onclick="save()">
						<span>
							Submit
							<i class="fa fa-save"></i>
						</span>
					</button>
				</div>
		</div>

		<div class="wrap-contact100" id="form_berhasil">
				<center><span class="contact100-form-title" style="padding-bottom: 5px;text-align: center;font-weight: bold;">
					Yamaha Day Competition (YMPI) Registration
				</span></center>

				<br>

				<center>Selamat! Tim Anda berhasil terdaftar dalam <br><span style="font-weight: bold;">Yamaha Day Competition 2021</span><br><br>Cabang <br><span id="cabang" style="font-weight: bold;font-size: 20px"></span><br><br>Nomor urut daftar Anda <br><span style="font-weight: bold;font-size: 20px" id="no_urut"></span></center>
				<!-- <label class="label-input1002">Game Category <span style="color:red">*</span></label> -->
		</div>
	</div>

</body>

<script src="{{ url('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<script src="{{ url('vendor/animsition/js/animsition.min.js')}}"></script>
<script src="{{ url('vendor/bootstrap/js/popper.js')}}"></script>
<script src="{{ url('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{ url('vendor/select2/select2.min.js')}}"></script>
<script src="{{ url('vendor/daterangepicker/moment.min.js')}}"></script>
<script src="{{ url('vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{ url('vendor/countdowntime/countdowntime.js')}}"></script>
<script src="{{ url('js/jquery.gritter.min.js') }}"></script>
<script src="{{ url('js/main.js')}}"></script>
<script src="{{ url('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>

<script type="text/javascript">
	jQuery(document).ready(function() {
		$('.datepicker').datepicker({
			autoclose: true,
			format: "yyyy-mm-dd",
			todayHighlight: true,
		});
		cancelAll();
	});

	function cancelAll() {
		$('#category').val('').trigger('change');
		$('#mobilelegend').hide();
		$('#pubg').hide();
		$('#cc').hide();
		$('#form_berhasil').hide();
		$('#form_buat').show();
	}
	
	$.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    }); 

    function changeCategory() {
    	var cat = $('#category').val();

    	if (cat == 'Mobile Legends') {
    		$('#mobilelegend').show();
    		$('#pubg').hide();
    		$('#cc').hide();
    		$('#team_name_ml').val('');
    		$('#phone_no_ml').val('');
    		for(var i = 1; i <= 5;i++){
    			$('#player_ml_'+i).val('');
    			$('#name_ml_'+i).val('');
    		}
    	}else if (cat == 'PUBG'){
    		$('#mobilelegend').hide();
    		$('#pubg').show();
    		$('#cc').hide();
    		$('#team_name_pubg').val('');
    		$('#phone_no_pubg').val('');
    		for(var i = 1; i <= 4;i++){
    			$('#player_pubg_'+i).val('');
    			$('#name_pubg_'+i).val('');
    		}
    	}else if (cat == 'YMPI QUIZ'){
    		$('#mobilelegend').hide();
    		$('#pubg').hide();
    		$('#cc').show();
    		$('#team_name_cc').val('');
    		$('#phone_no_cc').val('');
    		for(var i = 1; i <= 4;i++){
    			$('#player_cc_'+i).val('');
    			$('#name_cc_'+i).val('');
    		}
    	}else{
    		$('#mobilelegend').hide();
    		$('#cc').hide();
			$('#pubg').hide();
    	}
    }

	function checkEmp(value,id) {
		if (value.length == 6) {
			var data = {
		      	employee_id:value
		      }

		      $.get('{{ url("get_employee_sunfish") }}',data, function(result, status, xhr){
			      if(result.status){
					$.each(result.employee, function(key, value) {
						if ($('#category').val() == 'Mobile Legends') {
							$('#name_ml_'+id).val(value.name+' - '+value.department+' - '+value.section);
						}else if($('#category').val() == 'PUBG'){
							$('#name_pubg_'+id).val(value.name+' - '+value.department+' - '+value.section);
						}else{
							$('#name_cc_'+id).val(value.name+' - '+value.department+' - '+value.section);
						}
					});
			      }else{
			      	if ($('#category').val() == 'Mobile Legends') {
						$('#name_ml_'+id).val('');
					}else if ($('#category').val() == 'PUBG'){
						$('#name_pubg_'+id).val('');
					}else{
						$('#name_cc_'+id).val('');
					}
			      }
		      });
		}
		else if (value.length == 9) {
			var data = {
		      	employee_id:value
		      }

		      $.get('{{ url("get_employee_sunfish") }}',data, function(result, status, xhr){
			      if(result.status){
					$.each(result.employee, function(key, value) {
						if ($('#category').val() == 'Mobile Legends') {
							$('#name_ml_'+id).val(value.name+' - '+value.department+' - '+value.section);
						}else if($('#category').val() == 'PUBG'){
							$('#name_pubg_'+id).val(value.name+' - '+value.department+' - '+value.section);
						}else{
							$('#name_cc_'+id).val(value.name+' - '+value.department+' - '+value.section);
						}
					});
			      }
			      else{
			        if ($('#category').val() == 'Mobile Legends') {
						$('#name_ml_'+id).val('');
					}else if($('#category').val() == 'PUBG'){
						$('#name_pubg_'+id).val('');
					}else{
						$('#name_cc_'+id).val('');
					}
			      }

		      });
		}else{
			if ($('#category').val() == 'Mobile Legends') {
				$('#name_ml_'+id).val('');
			}else if($('#category').val() == 'PUBG'){
				$('#name_pubg_'+id).val('');
			}else{
				$('#name_cc_'+id).val('');
			}
		}
	}

	function save() {
		$("#loading").show();

		var category = $('#category').val();
		var team_name = '';
		var phone_no = '';
		var salah = 0;
		if (category == 'Mobile Legends') {
			for(var i = 1; i <= 5;i++){
				if ($('#player_ml_'+i).val() == '' || $('#team_name_ml').val() == '') {
					salah++;
				}
			}
		}else if (category == 'PUBG'){
			for(var i = 1; i <= 4;i++){
				if ($('#player_pubg_'+i).val() == '' || $('#team_name_pubg').val() == '') {
					salah++;
				}
			}
		}else{
			for(var i = 1; i <= 4;i++){
				if ($('#player_cc_'+i).val() == '' || $('#team_name_cc').val() == '') {
					salah++;
				}
			}
		}

		if(salah > 0){
		    $("#loading").hide();
			openErrorGritter('Error!', 'Masukkan Semua Data');
			return false;
		}

		var player = [];
		if (category == 'Mobile Legends') {
			team_name = $('#team_name_ml').val();
			phone_no = $('#phone_no_ml').val();
			for(var i = 1; i <= 5;i++){
				player.push({
					player_index:i,
					employee_id:$('#player_ml_'+i).val(),
					name:$('#name_ml_'+i).val().split(' - ')[0],
					department:$('#name_ml_'+i).val().split(' - ')[1],
					section:$('#name_ml_'+i).val().split(' - ')[2],
				});
			}
		}else if(category == 'PUBG'){
			team_name = $('#team_name_pubg').val();
			phone_no = $('#phone_no_pubg').val();
			for(var i = 1; i <= 4;i++){
				player.push({
					player_index:i,
					employee_id:$('#player_pubg_'+i).val(),
					name:$('#name_pubg_'+i).val().split(' - ')[0],
					department:$('#name_pubg_'+i).val().split(' - ')[1],
					section:$('#name_pubg_'+i).val().split(' - ')[2],
				});
			}
		}else{
			team_name = $('#team_name_cc').val();
			phone_no = $('#phone_no_cc').val();
			for(var i = 1; i <= 4;i++){
				player.push({
					player_index:i,
					employee_id:$('#player_cc_'+i).val(),
					name:$('#name_cc_'+i).val().split(' - ')[0],
					department:$('#name_cc_'+i).val().split(' - ')[1],
					section:$('#name_cc_'+i).val().split(' - ')[2],
				});
			}
		}

		var data = {
			category : $('#category').val(),
			team_name : team_name,
			phone_no : phone_no,
			player:player
		}

		$.post('{{ url("esport/input") }}', data, function(result, status, xhr){
			if(result.status == true){    
				$("#loading").hide();
				openSuccessGritter("Success","Berhasil Dibuat");
				cancelAll();
				$('#form_berhasil').show();
				$('#no_urut').html(result.no_urut);
				$('#cabang').html(result.cabang);
				$('#form_buat').hide();
				// location.reload();
			}
			else {
				$("#loading").hide();
				openErrorGritter('Error!', result.datas);
			}
		})
	}

	function openSuccessGritter(title, message){
		jQuery.gritter.add({
			title: title,
			text: message,
			class_name: 'growl-success',
			image: '{{ url("images/image-screen.png") }}',
			sticky: false,
			time: '2000'
		});
	}

	function openErrorGritter(title, message) {
		jQuery.gritter.add({
			title: title,
			text: message,
			class_name: 'growl-danger',
			image: '{{ url("images/image-stop.png") }}',
			sticky: false,
			time: '2000'
		});
	}
</script>

</html>