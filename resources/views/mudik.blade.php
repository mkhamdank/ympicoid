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

<section class="section colored" style="padding-bottom:20px">
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

                <div class="contact-form" style="background-color: #ffffff;padding: 20px;border-radius: 10px">

                 <div class="center-heading">
                    <h2 class="section-title">Informasi Mudik</h2>
                    <div class="center-text">
                        <p><b>Pastikan Melakukan {{$id}} Saat Mudik dan Kembali Ketika lebaran</b></p>
                    </div>
                </div>
                

                <div class="row">

                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ csrf_field() }}
                    <div class="col-lg-12 col-md-12 col-sm-12">
                      <fieldset>
                        <input type="hidden" name="employee_id" id="employee_id" value="{{$empsync[0]->employee_id}}">
                        <input type="hidden" name="name" id="name" value="{{$empsync[0]->name}}">
                        <!-- <input type="hidden" name="department" id="department" value="{{$empsync[0]->department}}"> -->
                        <input type="text" class="form-control"  placeholder="NIK Karyawan" readonly="" value="{{$empsync[0]->employee_id}} - {{$empsync[0]->name}}">
                    </fieldset>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">
                 <div class="team-item">
                     <div class="team-content">
                         <p><b>Berangkat</b> - Upload file {{$id}}</p>
                         <input type="text" class="form-control date" placeholder="Pilih Tanggal" id="date_departure">
                         <input type="file" id="file_berangkat" name="file_berangkat" style="height:auto">
                         <div class="col-lg-12">
                            <fieldset>
                                <button class="main-button" onclick="save('berangkat')">Upload</button>
                            </fieldset>

                            <?php if ($communication[0]->departure != null) { ?>
                                <br>
                                <div>
                                    <a href="{{url('files/mudik/'.$communication[0]->departure )}}" target="_blank">File Upload</a>
                                </div>
                            <?php } ?>
                        </div>


                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
             <div class="team-item">
                 <div class="team-content">
                    <p><b>Kembali</b> Upload file {{$id}}</p>
                    <input type="text" class="form-control date" id="date_arrive" placeholder="Pilih Tanggal">
                    <input type="file" id="file_kembali" name="file_kembali" style="height:auto">
                    <div class="col-lg-12" >
                        <fieldset>
                            <button class="main-button" onclick="save('kembali')">Upload</button>
                        </fieldset>
                        <?php if ($communication[0]->arrived != null) { ?>
                            <br>
                            <div>
                                <a href="{{url('files/mudik/'.$communication[0]->arrived )}}" target="_blank">File Upload</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="div_detail_sudah" style="margin-top: 20px">
        <center><span style="font-size: 18px;text-align: center;color: black;">
            Terimakasih <span style="color: blue;">{{$empsync[0]->name}}</span><span style="color: black;"> telah melakukan Pengisian Penerimaan Hasil MCU</span><br> pada<br><span style="font-weight: bold;color: red;">{{$empsync[0]->created_at}}</span> 
        </span></center>
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
<script src="{{ url("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script>

<script src="{{ url("js/jquery.gritter.min.js") }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    jQuery(document).ready(function() {
        $('#div_detail_sudah').hide();

        $('.date').datepicker({
            autoclose: true,
            format: "yyyy-mm-dd",
            todayHighlight: true
        }); 
    });

    function save(id) {
        $("#loading").show();

        var formData = new FormData();
        formData.append('jenis', "{{$id}}");
        formData.append('employee_id', "{{$empsync[0]->employee_id}}");
        formData.append('name', "{{$empsync[0]->name}}");

        if (id == "berangkat") {
            if ($('#file_berangkat').val().replace(/C:\\fakepath\\/i, '').split(".")[0] == "") {
                $("#loading").hide();
                openErrorGritter('Error!', 'File {{$id}} Keberangkatan Mudik Harus Diisi.');
                return false;
            }

            var file = $('#file_berangkat').val().replace(/C:\\fakepath\\/i, '').split(".");

            formData.append('status','berangkat');
            formData.append('date_departure',$('#date_departure').val());
            formData.append('file_berangkat', $('#file_berangkat').prop('files')[0]);
        }
        else if(id == "kembali"){
            if ($('#file_kembali').val().replace(/C:\\fakepath\\/i, '').split(".")[0] == "") {
                $("#loading").hide();
                openErrorGritter('Error!', 'File {{$id}} Saat Kembali Mudik Harus Diisi.');
                return false;
            }

            formData.append('status','kembali');
            formData.append('date_arrived', $('#date_arrive').val());
            formData.append('file_kembali', $('#file_kembali').prop('files')[0]);
        }

        $.ajax({
            url:"{{ url('post/mudik') }}",
            method:"POST",
            data:formData,
            dataType:'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(data)
            {
                if (data.status) {
                    openSuccessGritter('Success', data.message);
                    $('#loading').hide();
                    location.reload();
                }else{
                    openErrorGritter('Error!',data.message);
                    $('#loading').hide();
                }

            }
        });
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