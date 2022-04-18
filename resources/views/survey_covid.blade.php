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
        /*border: 1px solid rgba(0,0,0,0.1);*/
        /*height: 30px;*/
        /*background-color: #f2f2f2;*/
        /*min-height: 50px;*/
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
<section class="section colored" id="survey-covid">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div id="loading" style="margin: 0px; padding: 0px; position: fixed; right: 0px; top: 0px; width: 100%; height: 100%; background-color: rgb(0,191,255); z-index: 30001; opacity: 0.8; display: none">
        <p style="position: absolute; color: White; top: 45%; left: 35%;">
            <span style="font-size: 20px">Loading, mohon tunggu . . . <i class="fa fa-spin fa-refresh"></i></span>
        </p>
    </div>
    <div class="container">
        <div class="row">
            <br>
            <div class="col-lg-12" style="margin-top:20px">
                <div class="center-heading">
                    <!-- <h2 class="section-title">Survey Covid</h2> -->
                </div>
            </div>
        </div>

        <div class="row">
               <!--  <div class="col-lg-12 col-md-12 col-sm-12">
                    <h5 class="margin-bottom-30">Identitas Pribadi</h5>
                    <div class="contact-text" style="color:#111">
                        <p>NIK : <?= Auth::user()->username ?>
                        <br>Nama : <?= Auth::user()->name ?></p>
                    </div>
                </div> -->

                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="contact-form">
                        <form class="contact100-form validate-form" id="form_survey" style="display: none">
                            <div id="belum_survey" style="width: 100%;">
                                {{ csrf_field() }}
                                <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0">
                                    <?php 
                                    $jml_pertanyaan_survey = count($question);
                                    ?>

                                    <input type="hidden" id="jml_pertanyaan_survey" value="<?= $jml_pertanyaan_survey ?>">
                                    <input type="hidden" name="employee_id" id="employee_id" value="{{$empsync[0]->employee_id}}">
                                    <input type="hidden" name="name" id="name" value="{{$empsync[0]->name}}">
                                    <input type="hidden" name="department" id="department" value="{{$empsync[0]->department}}">

                                    <table id="tableQuestion" class="table table-bordered" style="overflow-x: scroll;border-collapse: collapse !important;width: 100%">
                                        <thead>
                                            <tr style="background-color: #945de0;color: white">
                                                <th><center>PENILAIAN RESIKO PRIBADI COVID-19</center></th>
                                            </tr>
                                        </thead>
                                        <tbody id="" style="background-color: #fff;">

                                            <?php 
                                            $no = 0; 
                                            ?>

                                            @foreach($question as $qs)
                                            <tr class="tab_{{ $no+1 }}" id="tab_{{ $no+1 }}">
                                                <td>
                                                    <label class="label-input1002" style="color: purple;margin-top: 0px;text-align: center;font-size: 18px"><span id="pertanyaan_survey<?= $no ?>">{{ $qs->pertanyaan }}</span></label>

                                                    <div class="validate-input" style="position: relative; width: 100%;">
                                                        <label class="radio_box" style="margin-top: 5px;font-size: 18px;">Ya
                                                            <input type="radio" id="jawabansurvey{{$no}}" name="jawabansurvey{{$no}}" value="Ya">
                                                            <span class="checkmark_box"></span>
                                                        </label>
                                                        <br>

                                                        @if ($no+1 != 1 && $no+1 != 16 && $no+1 != 19 && $no+1 != 20 && $no+1 != 21 && $no+1 != 22 && $no+1 != 23 && $no+1 != 24) 

                                                        <label class="radio_box" style="margin-top: 5px;font-size: 18px;">Kadang
                                                            <input type="radio" id="jawabansurvey{{$no}}" name="jawabansurvey{{$no}}" value="Kadang">
                                                            <span class="checkmark_box"></span>
                                                        </label>
                                                        <br>

                                                        @endif

                                                        <label class="radio_box" style="margin-top: 5px;font-size: 18px;">Tidak
                                                            <input type="radio" id="jawabansurvey{{$no}}" name="jawabansurvey{{$no}}" value="Tidak">
                                                            <span class="checkmark_box"></span>
                                                        </label>
                                                    </div>
                                                    <br>
                                                    <div class="validate-input" style="position: relative; width: 100%">
                                                        <?php 
                                                        if ($no+1 != 1) { ?>
                                                        <button id="back_{{$no+1}}" class="btn btn-danger" type="button" onclick="backSurvey(this.id)" style="display: inline-block;background-color: red !important">
                                                            <span>
                                                                Back
                                                                <i class="fa fa-arrow-left"></i>
                                                            </span>
                                                        </button>
                                                    <?php }
                                                    ?>


                                                    <?php 
                                                    if ($no+1 != $jml_pertanyaan_survey) { ?>
                                                    <button id="next_{{$no+1}}" class="btn btn-success" type="button" onclick="nextSurvey(this.id)" style="display: inline-block;float: right">
                                                        <span>
                                                            Next
                                                            <i class="fa fa-arrow-right"></i>
                                                        </span>
                                                    </button>
                                                    <?php } else { ?>
                                                    <button class="btn btn-warning" type="button" onclick="submitSurvey()" style="display: inline-block;float: right;">
                                                        <span>
                                                            Submit
                                                            <i class="fa fa-save"></i>
                                                        </span>
                                                    </button>
                                                <?php }
                                                ?>

                                            </div> 
                                            <?php 
                                            if ($no+1 == 1) { ?>

                                            <div class="validate-input" style="width: 100%;">
                                                <span style="font-weight: bold;margin-top: 40px;">Page {{$no+1}} of {{$jml_pertanyaan_survey}}</span>
                                            </div>

                                            <?php } else { ?>

                                            <div class="validate-input" style="width: 100%;">
                                                <span style="font-weight: bold;margin-top: 20px;float: right;">Page {{$no+1}} of {{$jml_pertanyaan_survey}}</span>
                                            </div>

                                            <?php
                                        }
                                        $no++;
                                        ?>
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <br>
                <div id="sudah_survey" style="width: 100%">
                    <div class="col-xs-12 col-md-12">
                        <center style="font-size:16px">Terimakasih <span class="name_survey"></span> telah mengisi laporan survey ini pada <span style="color: red"><div id="waktu_covid"></div></span><div id="resiko_covid"></div></center>
                    </div>
                </div>
            </form>

            <form class="contact100-form validate-form" style="padding: 0px 25px 58px 25px;display: none" id="form_belum_survey">
                <div style="width: 100%;">
                    <div class="col-xs-12 col-md-12 col-lg-12">
                        <center style="font-size:16px">Hai <?= Auth::user()->name ?><br>Survey Dapat Diisi Pada <span style="color: red">Minggu, 24 April 2022 Pukul 12:00 - 18:00 </span> <br></center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</section>

@stop
@section('scripts')

<script src="{{ url("js/jquery.gritter.min.js") }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).ready(function() {
       
        cek_survey();

        var tgl = "{{ $tgl }}";    
        
        if (tgl >= "2022-04-24 07:00:00" && tgl <= "2022-04-24 18:00:00") {
            $("#form_survey").show();
            $("#form_belum_survey").hide();
            hideAll();
        }
        else{
            $("#form_survey").hide();
            $("#form_belum_survey").show();
            hideAll();
        }
    });

    function cek_survey() {
        var data = {
            employee_id : "{{Auth::user()->username}}"
        }

        $.get('{{url("check/data")}}', data, function(result, status, xhr){
            if (result.status) {
                if (result.cek_survey.length > 0) {
                    $('#belum_survey').hide();
                    $('#sudah_survey').show();
                    $('#waktu_covid').html(result.cek_survey[0].created_at);
                    $('#resiko_covid').html('Tetap Jaga Kesehatan dan Kebersihan Diri Lingkungan Sekitarmu ya!');
                }
                else{
                    $('#belum_survey').show();
                    $('#sudah_survey').hide();
                }
                
            } else {
                $("#notif").show();
            }
        })
    }


    function hideAll() {
        for (var i=2; i<= $('#jml_pertanyaan_survey').val();i++) {
            $('#tab_'+i).hide();
        }
    }

    function submitSurvey() {
        $("#loading").show();

        var jumlah_pertanyaan_survey = $("#jml_pertanyaan_survey").val();
        var pertanyaan_survey = [];
        var jawaban_survey = [];

        for(var i = 0;i < jumlah_pertanyaan_survey; i++){

            pertanyaan_survey.push($("#pertanyaan_survey"+i).text());
            var answer_survey = 'jawabansurvey'+i;

            if ($('input[id="'+answer_survey+'"]:checked').val() == null) {
                $("#loading").hide();
                openErrorGritter('Error!', 'Survey Harus Diisi');
                return false;
            }

            jawaban_survey.push($('input[id="'+answer_survey+'"]:checked').val());
            
        }

            // console.log(pertanyaan_survey);
            // console.log(jawaban_survey);

            // return false;

            var data = {
                employee_id: $("#employee_id").val(),
                name: $("#name").val(),
                department: $("#department").val(),
                question: pertanyaan_survey,
                answer: jawaban_survey,
                jumlah_pertanyaan_survey : jumlah_pertanyaan_survey
            };

            $.post('{{ url("survey_covid/input") }}', data, function(result, status, xhr){
                if(result.status == true){    
                    $("#loading").hide();
                    $('#belum_survey').hide();
                    $('#sudah_survey').show();
                    $('#waktu_covid').html(result.tanggal);
                    $('#resiko_covid').html('Tetap Jaga Kesehatan dan Kebersihan Diri Lingkungan Sekitarmu ya!');
                }
                else {
                    $("#loading").hide();
                    openErrorGritter('Error!', result.message);
                }
            });
        }


        function backSurvey(elem){
            var back_id = elem.split("_");
            var back_next = parseInt(back_id[1])-1;
            $('#tab_'+back_id[1]).hide();
            $('#tab_'+back_next).show();
        }

        function nextSurvey(elem){
            var next_id = elem.split("_");
            var next_back = parseInt(next_id[1])+1;
            var next_array = parseInt(next_id[1])-1;

            var answer_survey = 'jawabansurvey'+next_array;

            if ($('input[id="'+answer_survey+'"]:checked').val() == null) {
                $("#loading").hide();
                openErrorGritter('Error!', 'Survey Harus Diisi');
                return false;
            }

            $('#tab_'+next_id[1]).hide();
            $('#tab_'+next_back).show();


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
    @endsection