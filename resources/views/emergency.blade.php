@extends('layouts.master')

@section('stylesheets')

<link href="{{ url("css/jquery.gritter.css") }}" rel="stylesheet">
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

<section class="section colored" id="emergency">
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
                    <h2 class="section-title" style="background-color:#955ddf;color:white;margin-bottom: 0px;border-top-left-radius: 10px;border-top-right-radius: 10px;font-size: 15px">Survey Kuisioner Emergency</h2>
                    <h3 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px"><?= $empsync[0]->employee_id ?> - <?= $empsync[0]->name ?></h3>
                </div>
                <div class="contact-form" style="background-color: white;padding: 20px;border-radius: 10px">
                   <div class="row">
                        <div class="offset-lg-3 col-lg-6">
                            <div class="center-text">
                                <p>Form ini merupakan media untuk mengumpulkan data dari karyawan YMPI ketika terjadi suatu peristiwa emergency</p>
                            </div>
                        </div>
                    </div>
                <!-- ***** Section Title End ***** -->

                    <div class="row">
                        <!-- ***** Contact Form Start ***** -->
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="contact-form">
                                <!-- <form id="contact" action="" method="get"> -->
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                     {{ csrf_field() }}
                                  <div class="row">
                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                      <fieldset>
                                        <input type="hidden" name="employee_id" id="employee_id" value="{{$empsync[0]->employee_id}}">
                                        <input type="hidden" name="name" id="name" value="{{$empsync[0]->name}}">
                                        <!-- <input type="hidden" name="department" id="department" value="{{$empsync[0]->department}}"> -->
                                        <input type="text" class="form-control"  placeholder="NIK Karyawan" readonly="" value="{{$empsync[0]->employee_id}} - {{$empsync[0]->name}}">
                                      </fieldset>
                                    </div>
                                    <!-- <div class="col-lg-4 col-md-12 col-sm-12">
                                      <fieldset>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Lengkap" readonly="" value="{{$empsync[0]->name}}">
                                      </fieldset>
                                    </div> -->
                                     <div class="col-lg-6 col-md-12 col-sm-12">
                                      <fieldset>
                                        <input type="text" class="form-control" id="department" name="department" placeholder="Department" readonly="" value="{{$empsync[0]->department}}">
                                      </fieldset>
                                    </div>

                                    <div class="col-lg-8 col-md-8 col-sm-8">
                                      <fieldset>
                                        <span id="pertanyaan">Apakah ada anggota keluarga Anda yang menjadi korban dari peristiwa tersebut </span>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-4 col-md-4 col-sm-4" style="text-align: right;">
                                        <fieldset>
                                        <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                                            <input type="radio" id="jawaban" name="jawaban" value="Iya" required="" onclick="changeJawaban(this.value)">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                                            <input type="radio" id="jawaban" name="jawaban" value="Tidak" required="" onclick="changeJawaban(this.value)">
                                            <span class="checkmark"></span>
                                        </label>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label class="label-input1002" id="labelname">Nama Anggota Keluarga yang Terdampak</label>

                                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Anggota Keluarga yang Terdampak">
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <label class="label-input1002" id="labelhubungan">Hubungan dengan Anggota Keluarga yang Terdampak</label>

                                        <select class="form-control" placholder="Pilih Hubungan Keluarga" name="hubungan" id="hubungan">
                                            <option value="-"></option>
                                            <option value="Ayah">Ayah</option>
                                            <option value="Ibu">Ibu</option>
                                            <option value="Suami">Suami</option>
                                            <option value="Istri">Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Saudara">Saudara</option>
                                        </select>
                                    </div>


                                    <input type="hidden" class="form-control" id="keterangan" name="keterangan" value="Emergency">

                                    <div class="col-lg-12" style="margin-top: 20px">
                                      <fieldset>
                                        <button class="main-button" onclick="save()">Submit</button>
                                      </fieldset>
                                    </div>
                                  </div>
                                <!-- </form> -->
                            </div>
                        </div>
                        <!-- ***** Contact Form End ***** -->
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
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).ready(function() {
        $('#nama').hide();
        $('#labelname').hide();
        $('#hubungan').hide();
        $('#labelhubungan').hide();
        $('#nama').val("");
        $('#hubungan').val("").trigger('change');
    });
    

    function changeJawaban(value) {
        if (value === 'Iya') {
            $('#nama').show();
            $('#labelname').show();
            $('#hubungan').show();
            $('#labelhubungan').show();
            $('#nama').val("");
            $('#hubungan').val("").trigger('change');
        }else{
            $('#nama').hide();
            $('#labelname').hide();
            $('#hubungan').hide();
            $('#labelhubungan').hide();
            $('#nama').val("");
            $('#hubungan').val("").trigger('change');
        }
    }

    function save() {
        $("#loading").show();

        if ($('input[id="jawaban"]:checked').val() == null) {
            $("#loading").hide();
            openErrorGritter('Error!', 'Jawaban Harus Diisi.');
            return false;
        }

        if ($('input[id="jawaban"]:checked').val() == 'Iya' && $('#nama').val() == "") {
            $("#loading").hide();
            openErrorGritter('Error!', 'Jawaban Harus Diisi.');
            return false;
        }

        if ($('input[id="jawaban"]:checked').val() == 'Iya' && $('#hubungan').val() == "") {
            $("#loading").hide();
            openErrorGritter('Error!', 'Jawaban Harus Diisi.');
            return false;
        }

        var data = {
            employee_id : $('#employee_id').val(),
            name : $('#name').val(),
            department : $('#department').val(),
            jawaban : $('input[id="jawaban"]:checked').val(),
            keterangan : $('#keterangan').val(),
            nama : $('#nama').val(),
            hubungan : $('#hubungan').val()
        }

        $.get('{{ url("post/emergency") }}', data, function(result, status, xhr){
            if(result.status == true){    
                $("#loading").hide();
                openSuccessGritter("Success","Berhasil Dibuat");
                location.reload();
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

@stop