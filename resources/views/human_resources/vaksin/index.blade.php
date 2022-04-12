@extends('layouts.master')

@section('stylesheets')
<link href="{{ url("css/jquery.gritter.css") }}" rel="stylesheet">
<link rel="stylesheet" href="{{ url("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}">
<style type="text/css">
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

    .discussion > span > p > img {
        width: 300px;
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


    .radio_box {
        /*display: inline-block;*/
        position: relative;
        padding-left: 35px;
        padding-top: 4px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 14px;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
        border: 1px solid rgba(0,0,0,0.1);
        /*height: 30px;*/
        background-color: #f2f2f2;
        min-height: 50px;
        width: 100% !important;
    }

    /* Hide the browser's default radio button */
    .radio_box input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .checkmark_box {
        position: absolute;
        top: 3px;
        left: 8px;
        height: 20px;
        width: 20px;
        background-color: #ccc;
    }


    /* On mouse-over, add a grey background color */
    .radio_box:hover input ~ .checkmark_box {
        background-color: #ccc;
    }

    /* When the radio button is checked, add a blue background */
    .radio_box input:checked ~ .checkmark_box {
        background-color: #2196F3;
    }

    /* Create the indicator (the dot/circle - hidden when not checked) */
    .checkmark_box:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the indicator (dot/circle) when checked */
    .radio_box input:checked ~ .checkmark_box:after {
        display: block;
    }

    /* Style the indicator (dot/circle) */
    .radio_box .checkmark_box:after {
        top: 6px;
        left: 6px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }

    .container_checkmark {
        display: block;
        position: relative;
        padding-left: 35px;
        margin-bottom: 12px;
        cursor: pointer;
        font-size: 16px;
        font-weight: bold;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }

    /* Hide the browser's default checkbox */
    .container_checkmark input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }

    /* Create a custom checkbox */
    .checkmark_checkmark {
        position: absolute;
        top: 0;
        left: 0;
        height: 25px;
        width: 25px;
        background-color: #eee;
    }

    /* On mouse-over, add a grey background color */
    .container_checkmark:hover input ~ .checkmark_checkmark {
        background-color: #ccc;
    }

    /* When the checkbox is checked, add a blue background */
    .container_checkmark input:checked ~ .checkmark_checkmark {
        background-color: #2196F3;
    }

    /* Create the checkmark/indicator (hidden when not checked) */
    .checkmark_checkmark:after {
        content: "";
        position: absolute;
        display: none;
    }

    /* Show the checkmark when checked */
    .container_checkmark input:checked ~ .checkmark_checkmark:after {
        display: block;
    }

    /* Style the checkmark/indicator */
    .container_checkmark .checkmark_checkmark:after {
        left: 9px;
        top: 5px;
        width: 5px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }
</style>
@endsection


@section('content')

<section class="section colored" id="laporan-kesehatan">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="loading" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(0,191,255); z-index: 30001; opacity: 0.8; display: none">
        <p style="position: absolute; color: White; top: 45%; left: 35%;">
            <span style="font-size: 20px">Loading, mohon tunggu . . . <i class="fa fa-spin fa-refresh"></i></span>
        </p>
    </div>
    <div class="container">
        <div class="row">
            <br>
            <div class="col-lg-12" style="margin-top:20px;">
                <div class="center-heading">
                    <h2 class="section-title" style="background-color:#955ddf;color:white;margin-bottom: 0px;border-top-left-radius: 10px;border-top-right-radius: 10px;font-size: 15px">VAKSINASI COVID-19</h2>
                    <!-- <h4 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px"><?= $empsync[0]->employee_id ?> - <?= $empsync[0]->name ?></h4> -->
                    <h4 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px">{{$empsync[0]->employee_id}} - {{$empsync[0]->name}}</h4>
                    <input type="hidden" name="employee_id" id="employee_id" value="{{$empsync[0]->employee_id}}">
                    <input type="hidden" name="name" id="name" value="{{$empsync[0]->name}}">
                    <input type="hidden" name="department" id="department" value="{{$empsync[0]->department}}">
                </div>
                <div class="contact-form" style="background-color: white;padding: 15px;border-radius: 10px">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ csrf_field() }}
                    <div class="row" id="vaksin">
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Vaksin 1</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="vaksin_1" id="vaksin_1" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Tanggal Vaksin 1" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Vaksin 2</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="vaksin_2" id="vaksin_2" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Tanggal Vaksin 2" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Jenis Vaksin</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <!-- <input type="text" name="vaksin_2" id="vaksin_2" class="form-control" style="width: 100% !important" placeholder="Tanggal Vaksin 2"> -->
                                <select style="width: 100%;margin-bottom: 0px" class="form-control" name="jenis_vaksin" id="jenis_vaksin">
                                    <option value="Sinovac">Sinovac</option>
                                    <option value="AstraZeneca">AstraZeneca</option>
                                    <option value="SinoPharm">SinoPharm</option>
                                    <option value="Moderna">Moderna</option>
                                    <option value="Pfizer">Pfizer</option>
                                </select>
                            </div>
                        </div>

                       <!--  <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Panggilan Vaksinasi 3 (Lihat di Aplikasi Peduli Lindungi)</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="call_vaksin_3" id="call_vaksin_3" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Tanggal Panggilan Vaksin 3" readonly>
                            </div>
                        </div> -->

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Aktual Vaksinasi 3 (Booster)</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="vaksin_3" id="vaksin_3" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Tanggal Panggilan Vaksin 3" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Jenis Vaksin 3</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <!-- <input type="text" name="vaksin_2" id="vaksin_2" class="form-control" style="width: 100% !important" placeholder="Tanggal Vaksin 2"> -->
                                <select style="width: 100%;margin-bottom: 0px" class="form-control" name="jenis_vaksin_3" id="jenis_vaksin_3">
                                    <option value="Sinovac">Sinovac</option>
                                    <option value="AstraZeneca">AstraZeneca</option>
                                    <option value="SinoPharm">SinoPharm</option>
                                    <option value="Moderna">Moderna</option>
                                    <option value="Pfizer">Pfizer</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <button class="main-button" type="button" id="vaksin_register_btn" onclick="register()" style="display: inline-block;float: left;margin-top: 20px;background-color: green">
                                <i class="fa fa-save"></i> Daftar Vaksin 3 
                            </button>

                            <button class="main-button" type="button" id="vaksin_register_btn_cancel" onclick="cancelRegister()" style="display: inline-block;float: left;margin-top: 20px;background-color: red">
                                <i class="fa fa-close"></i> Batal
                            </button>

                            <button class="main-button" type="button" onclick="save()" style="display: inline-block;float: right;margin-top: 20px;">
                                <i class="fa fa-save"></i> Submit
                            </button>
                        </div>
                    </div>

                    <div class="row" id="vaksin_register">
                        <center style="background-color:#85c2ff;width: 100%;margin: 0px;margin-top: 20px;padding: 10px">
                            <span lass="section-title" style="font-size: 15px;font-weight: bold;color: black">PENDAFTARAN VAKSIN 3 (BOOSTER)</span>
                        </center>
                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">No. KTP</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="ktp" id="ktp" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="No. KTP" value="{{$empsync[0]->card_id}}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tempat Lahir</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="birth_place" id="birth_place" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Tempat Lahir" value="{{$empsync[0]->birth_place}}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Lahir</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="birth_date" id="birth_date" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Tanggal Lahir" value="{{$empsync[0]->birth_date}}" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Alamat Sesuai KTP</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="address" id="address" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Alamat Sesuai KTP" value="{{$empsync[0]->address}}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-left: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">No. HP</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="phone" id="phone" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="No. HP" value="{{$empsync[0]->phone}}">
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-6 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Panggilan Vaksinasi 3 (Lihat di Aplikasi Peduli Lindungi)</label>
                            <div class="validate-input" style="position: relative; width: 100% !important">
                                <input type="text" name="call_vaksin_3_register" id="call_vaksin_3_register" class="form-control" style="width: 100% !important;margin-bottom: 0px" placeholder="Tanggal Panggilan Vaksin 3" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 col-lg-12 col-xs-12 col-sm-12" style="padding-right: 20px;">
                            <button class="main-button" type="button" onclick="saveRegister()" style="display: inline-block;float: right;margin-top: 20px;">
                                <i class="fa fa-save"></i> Submit
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@stop


@section('scripts')
<script src="{{ url("bower_components/jquery/dist/jquery.min.js")}}"></script>
<script src="{{ url("bower_components/bootstrap/dist/js/bootstrap.min.js")}}"></script>
<script src="{{ asset('js/jquery.min.js')}}"></script>
<script src="{{ url("js/jquery.gritter.min.js") }}"></script>
<script src="{{ url("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).ready(function() {
        $('#vaksin_register_btn').hide();
        $('#vaksin_register_btn_cancel').hide();
        $('#vaksin_1').datepicker({
            <?php $tgl_max = date('Y-m-d') ?>
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,   
            orientation: "bottom",
        });

        $('#vaksin_2').datepicker({
            <?php $tgl_max = date('Y-m-d') ?>
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,   
            orientation: "bottom",
        });

        // $('#call_vaksin_3').datepicker({
        //     <?php $tgl_max = date('Y-m-d') ?>
        //     autoclose: true,
        //     format: "yyyy-mm-dd",
        //     todayHighlight: true,   
        //     orientation: "bottom",
        // });

        $('#vaksin_3').datepicker({
            <?php $tgl_max = date('Y-m-d') ?>
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,   
            orientation: "bottom",
        });

        $('#call_vaksin_3_register').datepicker({
            <?php $tgl_max = date('Y-m-d') ?>
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true,   
            orientation: "bottom",
        });

        cekVaksin();
    });

    function cekVaksin() {
        $('#loading').show();
        var data = {
            employee_id:'{{$empsync[0]->employee_id}}'
        }

        $.get('{{ url("vaksin/check") }}', data, function(result, status, xhr){
            if(result.status == true){
                $('#vaksin_1').val(result.vaksin.vaksin_1);
                $('#vaksin_2').val(result.vaksin.vaksin_2);
                $('#jenis_vaksin').val(result.vaksin.jenis_vaksin).trigger('change');
                // $('#call_vaksin_3').val(result.vaksin.call_vaksin_3);
                $('#jenis_vaksin_3').val(result.vaksin.jenis_vaksin_3).trigger('change');
                $('#vaksin_3').val(result.vaksin.vaksin_3);

                if (result.vaksin.vaksin_3 == null && result.vaksin_3 == null && getActualFullDate() < result.date_vaksin_regis) {
                    $('#vaksin_register_btn').show();
                    $('#vaksin_register').hide();
                    $('#vaksin_register_btn_cancel').hide();
                    $('#call_vaksin_3_register').val('');
                }else{
                    $('#vaksin_register_btn').hide();
                    $('#vaksin_register').hide();
                    $('#vaksin_register_btn_cancel').hide();
                }
                $('#loading').hide();
            }else{
                $("#loading").hide();
                openErrorGritter('Error!', result.message);
            }
        });
    }

    function register() {
        $('#vaksin_register_btn').hide();
        $('#vaksin_register_btn_cancel').show();
        $('#vaksin_register').show();
    }

    function cancelRegister() {
        cekVaksin();
    }

    function save() {
        $("#loading").show();

        if($("#vaksin_1").val() == "" || $("#jenis_vaksin").val() == "" ){
            $("#loading").hide();
            openErrorGritter('Error!', 'Tanggal Vaksin 1 dan Vaksin 2 harus diisi.');
            return false;
        }

        var data = {
            employee_id : $('#employee_id').val(),
            name : $('#name').val(),
            department : $('#department').val(),
            vaksin_1 : $('#vaksin_1').val(),
            vaksin_2 : $('#vaksin_2').val(),
            jenis_vaksin : $('#jenis_vaksin').val(),
            vaksin_3 : $('#vaksin_3').val(),
            // call_vaksin_3 : $('#call_vaksin_3').val(),
            jenis_vaksin_3 : $('#jenis_vaksin_3').val(),
        }

        $.get('{{ url("vaksin/input") }}', data, function(result, status, xhr){
            if(result.status == true){    
                $("#loading").hide();
                openSuccessGritter("Success","Berhasil Input Vaksin");
                // location.reload();
                cekVaksin();
            }
            else {
                $("#loading").hide();
                openErrorGritter('Error!', result.datas);
            }
        })
    }

    function saveRegister() {
        $("#loading").show();
        if ($('#call_vaksin_3_register').val() == '') {
            $('#loading').hide();
            openErrorGritter('Error!','Isi Tanggal Panggilan Vaksin 3');
            return false;
        }

        var data = {
            employee_id : $('#employee_id').val(),
            name : $('#name').val(),
            department : $('#department').val(),
            birth_place : $('#birth_place').val(),
            birth_date : $('#birth_date').val(),
            ktp : $('#ktp').val(),
            address : $('#address').val(),
            no_hp : $('#phone').val(),
            // jumlah_keluarga : $('#jumlah_keluarga').val(),
            call_vaksin_3 : $('#call_vaksin_3_register').val(),

            // keluarga_hubungan : arr_hubungan,
            // keluarga_name : arr_name,
            // keluarga_ktp : arr_ktp,
            // keluarga_birth_place : arr_birth_place,
            // keluarga_birth_date : arr_birth_date,
            // keluarga_address : arr_address,
            // keluarga_phone : arr_phone,
        }

        $.get('{{ url("vaksin/registration/input") }}', data, function(result, status, xhr){
            if(result.status == true){    
                $("#loading").hide();
                openSuccessGritter("Success","Register Berhasil");
                // location.reload();
                cekVaksin();
            }else{
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

    function getActualFullDate() {
        var d = new Date();
        var day = addZero(d.getDate());
        var month = addZero(d.getMonth()+1);
        var year = addZero(d.getFullYear());
        var h = addZero(d.getHours());
        var m = addZero(d.getMinutes());
        var s = addZero(d.getSeconds());
        return year + "-" + month + "-" + day + " " + h + ":" + m + ":" + s;
    }

    function addZero(number) {
        return number.toString().padStart(2, "0");
    }
</script>
@stop