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
                    {{-- <h2 class="section-title">Survey Stocktaking</h2> --}}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <div id="stocktaking_survey_form" style="display: none;">
                        <div style="width: 100%;">
                            {{ csrf_field() }}
                            <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0">
                                @php
                                $stocktaking_survey_count = count($question);
                                @endphp
                                <input type="hidden" id="stocktaking_survey_count" value="{{ $stocktaking_survey_count }}">
                                <input type="hidden" id="employee_id" value="{{ Auth::user()->username }}">

                                <table id="tableStocktakingSurvey" class="table table-bordered" style="overflow-x: scroll ;border-collapse: collapse !important; width: 100%">
                                    <thead>
                                        <tr style="background-color: #945de0;color: white">
                                            <th>PENILAIAN PEMAHAMAN USER TERKAIT STOCKTAKING</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody id="" style="background-color: #fff;">

                                        @php $no = 0; @endphp
                                        @foreach($question as $qs)                                        
                                        <tr class="stocktaking_tab_{{ $no+1 }}" id="stocktaking_tab_{{ $no+1 }}">
                                            <td>
                                                <center>
                                                    <img style="max-width: 70%;" id="image_question_{{ $no+1 }}" src="{{ url( 'images/stocktaking/' . $qs->image ) }}" alt="{{ $qs->image }}">
                                                </center>
                                                <label class="label-input1002" style="color: purple; margin-top: 0px; text-align: center; font-size: 14px"><span id="survey_question_{{ $no }}">{{ $qs->question }}</span>
                                                </label>

                                                <div class="validate-input" style="position: relative; width: 100%">
                                                    <label class="radio_box" style="margin-top: 5px">Ya
                                                        <input type="radio" id="survey_answer_{{ $no }}" name="survey_answer_{{ $no }}" value="Ya">
                                                        <span class="checkmark_box"></span>
                                                    </label>

                                                    <label class="radio_box" style="margin-top: 5px">Tidak
                                                        <input type="radio" id="survey_answer_{{ $no }}" name="survey_answer_{{ $no }}" value="Tidak">
                                                        <span class="checkmark_box"></span>
                                                    </label>
                                                </div>
                                                <div class="validate-input" style="position: relative; width: 100%">
                                                    @if($no+1 != 1)
                                                    <button id="back_{{ $no+1 }}" class="btn btn-default" onclick="backSurveyStocktaking(this.id)" style="display: inline-block; border-color: #cccccc">
                                                        <span><i class="fa fa-arrow-left"></i>&nbsp;Back</span>
                                                    </button>
                                                    @endif
                                                    @if($no+1 != $stocktaking_survey_count)
                                                    <button id="next_{{ $no+1 }}" class="btn btn-primary" onclick="nextSurveyStocktaking(this.id)" style="display: inline-block; float: right">
                                                        <span>Next&nbsp;<i class="fa fa-arrow-right"></i></span>
                                                    </button>
                                                    @else
                                                    <button class="btn btn-success" onclick="submitSurveyStoctaking()" style="display: inline-block; float: right;">
                                                        <span>Submit<i class="fa fa-arrow-right"></i></span>
                                                    </button>
                                                    @endif
                                                </div>

                                                @if($no+1 == 1)
                                                <div class="validate-input" style="width: 100%;">
                                                    <span style="font-weight: bold; margin-top: 40px;">Page {{ $no+1 }} of {{ $stocktaking_survey_count }}</span>
                                                </div>
                                                @else
                                                <div class="validate-input" style="width: 100%;">
                                                    <span style="font-weight: bold; margin-top: 20px; float: right;">Page {{ $no+1 }} of {{ $stocktaking_survey_count }}</span>
                                                </div>
                                                @endif
                                                @php $no++; @endphp
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0px 25px 58px 25px; display: none" id="stocktaking_survey_finish">
                        <div style="width: 100%;">
                            <div class="col-xs-12 col-md-12 col-lg-12" style="margin-top: 5%;">
                                <center style="font-size:16px">
                                    Terimakasih <span class="name"></span>,<br>
                                    Anda telah mengisi survey stocktaking pada <span style="color: red" id="stocktaking_survey_time"></span>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0px 25px 58px 25px; display: none" id="stocktaking_survey_not_yet">
                        <div style="width: 100%;">
                            <div class="col-xs-12 col-md-12 col-lg-12" style="margin-top: 5%;">
                                <center style="font-size:16px">
                                    Hai <span class="name"></span>,<br>
                                    Survey dapat diisi mulai <span style="color: red;" id="survey_date"></span>
                                </center>
                            </div>
                        </div>
                    </div>

                    <div style="padding: 0px 25px 58px 25px; display: none" id="stocktaking_survey_not_authorized">
                        <div style="width: 100%;">
                            <div class="col-xs-12 col-md-12 col-lg-12" style="margin-top: 5%;">
                                <center style="font-size:16px">
                                    Hai <span class="name"></span>,<br>
                                    Mohon maaf survey hanya dapat diisi oleh member stocktaking
                                </center>
                            </div>
                        </div>
                    </div>

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
    });

    function cek_survey() {
        var data = {
            employee_id : "{{Auth::user()->username}}"
        }

        $.get('{{url("fetch/check_survey_stocktaking")}}', data, function(result, status, xhr){
            if (result.status) {

                $('.name').text(result.employee.name);
                $('#survey_date').text(result.survey_date);

                var position = [
                'Operator Contract',
                'Operator',
                'Senior Operator',
                'Sub Leader',
                'Leader'
                ];

                var section = [
                'Pianica Process Section',
                'Recorder Proces',
                'Body Parts Process Section',
                'Assembly CL . Tanpo . Case Process Section',
                'Assembly FL Process Section',
                'Assembly Sax Process Section',
                'NC Process Section',
                'Press and Sanding Process Section',
                'Body Buffing-Barrel Process Section',
                'Buffing Key Process Section',
                'SurfaceTreatment Section',
                'Handatsuke . Support Process Section',
                'Koshuha Solder Process Section',
                'Warehouse Section'
                ];

                var department = [
                'Management Information System Department',
                'Purchasing Control Department'
                ];

                if( ( position.includes(result.employee.position) && section.includes(result.employee.section) ) || department.includes(result.employee.department) ){
                    var date = parseInt(result.date);

                    if (date >= 20 && date <= 31) {

                        if(result.cek_stocktaking_survey.length > 0) {
                            $('#stocktaking_survey_form').hide();
                            $('#stocktaking_survey_finish').show();
                            $("#stocktaking_survey_not_yet").hide();
                            $("#stocktaking_survey_not_authorized").hide();
                            $('#stocktaking_survey_time').html(result.cek_stocktaking_survey[0].created_at);

                        }else{
                            $('#stocktaking_survey_form').show();
                            $('#stocktaking_survey_finish').hide();
                            $("#stocktaking_survey_not_yet").hide();
                            $("#stocktaking_survey_not_authorized").hide();
                            hideAll();

                        }

                    }else{
                        $("#stocktaking_survey_form").hide();
                        $("#stocktaking_survey_finish").hide();
                        $("#stocktaking_survey_not_yet").show();
                        $("#stocktaking_survey_not_authorized").hide();

                    }

                }else{
                    $("#stocktaking_survey_form").hide();
                    $("#stocktaking_survey_finish").hide();
                    $("#stocktaking_survey_not_yet").hide();
                    $("#stocktaking_survey_not_authorized").show();

                }

            }
        })
    }


    function hideAll() {
        for (var i=2; i <= $('#stocktaking_survey_count').val() ;i++) {
            $('#stocktaking_tab_'+i).hide();
        }
    }


    function submitSurveyStoctaking() {
        $("#loading").show();

        var count_question = $("#stocktaking_survey_count").val();
        var survey_question = [];
        var survey_answer = [];

        for(var i = 0; i < count_question; i++){

            survey_question.push( $("#survey_question_"+i).text() );

            if ($('input[id="survey_answer_' + i + '"]:checked').val() == null) {
                $("#loading").hide();
                openErrorGritter('Error!', 'Survey Harus Diisi');
                return false;
            }

            survey_answer.push( $('input[id="survey_answer_' + i + '"]:checked').val() );

        }

        var data = {
            employee_id: $("#employee_id").val(),
            question: survey_question,
            answer: survey_answer,
            count_question : count_question
        };

        $.post('{{ url("input/survey_stocktaking") }}', data, function(result, status, xhr){
            if(result.status == true){    
                $("#loading").hide();
                $("#stocktaking_survey_form").hide();
                $("#stocktaking_survey_finish").show();
                $("#stocktaking_survey_not_yet").hide();
                $("#stocktaking_survey_not_authorized").hide();

                $('#stocktaking_survey_time').html(result.now);

            }else {
                $("#loading").hide();
                openErrorGritter('Error!', result.message);
            }
        });

    }

    function backSurveyStocktaking(elem){
        var back_id = elem.split("_");
        var back_next = parseInt(back_id[1])-1;
        $('#stocktaking_tab_'+back_id[1]).hide();
        $('#stocktaking_tab_'+back_next).show();
    }

    function nextSurveyStocktaking(elem){
        var next_id = elem.split("_");
        var next_back = parseInt(next_id[1])+1;
        var next_array = parseInt(next_id[1])-1;

        var answer_survey = 'survey_answer_'+next_array;

        if ($('input[id="'+answer_survey+'"]:checked').val() == null) {
            $("#loading").hide();
            openErrorGritter('Error!', 'Survey Harus Diisi');
            return false;
        }

        $('#stocktaking_tab_'+next_id[1]).hide();
        $('#stocktaking_tab_'+next_back).show();


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