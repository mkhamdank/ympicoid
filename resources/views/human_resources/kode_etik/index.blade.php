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
                    <h2 class="section-title" style="background-color:#955ddf;color:white;margin-bottom: 0px;border-top-left-radius: 10px;border-top-right-radius: 10px;font-size: 15px">TRAINING KODE ETIK KEPATUHAN</h2>
                    <!-- <h4 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px"><?= $empsync[0]->employee_id ?> - <?= $empsync[0]->name ?></h4> -->
                    <h4 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px">PERIODE 2021-2022</h4>
                    <input type="hidden" name="employee_id" id="employee_id" value="{{$empsync[0]->employee_id}}">
                    <input type="hidden" name="name" id="name" value="{{$empsync[0]->name}}">
                </div>
                <div class="contact-form" style="background-color: white;padding: 15px;border-radius: 10px">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="periode" id="periode" value="">
                    <center id="title_pertanyaan">
                        <span class="center-heading" style="padding-bottom: 15px;text-align: center;font-weight: bold;font-size: 18px">
                            PERTANYAAN
                        </span>
                    </center>
                    <div class="row">
                        <?php $kodeetik_question_total = count($kode_etik_question) ?>
                        <?php if (count($kode_etik_question) > 0): ?>
                            <?php $no = 0; ?>
                            @foreach($kode_etik_question as $kode_etik_question)
                            <div id="div_kodeetik_question_<?= $no ?>" style="display: none;width: 100%;padding: 15px;" class="col-xs-12">
                                <label class="label-input1002" style="color: purple;margin-top: 0px;font-size: 14px"><span id="kodeetik_question_<?= $no ?>">{{$no+1}}. {{ $kode_etik_question->question }}</span></label>

                                <?php $kodeetik_answer = explode('_', $kode_etik_question->answer) ?>

                                <?php for ($i=0; $i < count($kodeetik_answer); $i++) { ?>
                                    <div class="validate-input" style="position: relative; width: 100%">
                                        <label class="radio_box" style="margin-top: 5px;font-size: 12px">{{$kodeetik_answer[$i]}}
                                            <input type="radio" id="kodeetik_answer_{{$no}}" name="kodeetik_answer_{{$no}}" value="{{$kodeetik_answer[$i]}}">
                                            <span class="checkmark_box"></span>
                                        </label>
                                    </div>
                                <?php } ?>
                                <input type="hidden" name="kodeetik_right_answer_{{$no}}" id="kodeetik_right_answer_{{$no}}" value="{{$kode_etik_question->right_answer}}">
                                <br>
                            </div>
                            <div id="div_kodeetik_discussion_<?= $no ?>" style="display: none;width: 100%;padding: 15px;" class="col-xs-12 discussion">
                                <center><span id="kodeetik_announcement_<?= $no ?>" style="font-weight: bold;font-size: 20px"></span></center>
                                <br>
                                <center><span id="images_<?= $no ?>" style="display: none;"><img src='../public/images/kode_etik/yess_answer.png' width='18%'></span>
                                </center>
                                <br>
                                <center><span id="images_not_<?= $no ?>" style="display: none;"><img src='../public/images/kode_etik/sad.png' width='18%'></span>
                                </center>
                                <br>
                                <center><span style="font-weight: bold;font-size: 20px">Jawaban yang benar adalah</span><br>
                                    <span><?php echo $kode_etik_question->right_answer ?></span>
                                </center>
                            </div>

                            
                            <button class="main-button" type="button" id="btn_kodeetik_submit_<?= $no ?>" onclick="submitKodeEtikQuestion('{{$no}}')" style="display: inline-block;float: right;display: none;margin: 20px">
                                <span>
                                    Submit
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </button>
                            <button class="main-button" type="button" id="btn_kodeetik_back_<?= $no ?>" onclick="backKodeEtikQuestion('{{$no}}')" style="display: inline-block;float: right;display: none;background-color: red;margin: 20px">
                                <span>
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                </span>
                            </button>
                            <button class="main-button" type="button" id="btn_kodeetik_next_<?= $no ?>" onclick="nextKodeEtikQuestion('{{$no}}')" style="display: inline-block;float: right;display: none;margin: 20px">
                                <span>
                                    Next
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </button>
                            <?php $no++ ?>
                            @endforeach
                        <?php endif ?>
                       
                        <div id="title_sambutan" style="width: 100%; display:none;">
                            <div class="col-xs-12 col-md-12">
                                <center><span id="images_nova_<?= $no ?>"><img src='../public/images/kode_etik/kode_etik1.png' width="50%"></span>
                                </center>
                                <br>
                                <center style="font-size:16px">Terima kasih sudah mengikuti Training Refreshment Code of Conduct (Kode Etik) yang dilakukan oleh HR Dept.<br>Sebagai feed back atas training tersebut, mohon untuk mengisi daftar pertanyaan berikut : </center>
                                <br>
                                <button class="main-button" type="button" id="btn_kodeetik_next_awal" onclick="nextKodeEtikAwal()" style="display: inline-block;float: right;display: none;margin: 20px">
                                    <span>
                                        Next
                                        <i class="fa fa-arrow-right"></i>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div id="div_detail_belum" style="margin-top: 20px">
                        <center><span style="font-size: 18px;text-align: center;font-weight: bold;">
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            Maaf, fitur ini masih dalam pengembangan.
                        </span></center>
                    </div>

                    <div id="div_detail_sudah" style="margin-top: 20px">
                       <center>
                        <div><img src='../public/images/kode_etik/Thanks_veno.png' width='35%'></div> 
                    </center>
                    <br>
                    <center><span style="font-size: 18px;text-align: center;color: black;">
                        <?php date_default_timezone_set('Asia/Jakarta'); ?>
                        Terimakasih <span style="color: blue;">{{$empsync[0]->name}}</span><span style="color: black;"> telah melakukan Training Kode Etik Kepatuhan</span><br> pada<br>
                        <?php if (ISSET($cek_kode_etik) && $cek_kode_etik != null){ ?>
                            <span id="tanggal_kode_etik" style="font-weight: bold;color: red;">{{$cek_kode_etik->created_at}}</span> 
                        <?php }else{ ?>
                            <span id="tanggal_kode_etik" style="font-weight: bold;color: red;"></span>
                        <?php } ?>
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
<script src="{{ url("js/jquery.gritter.min.js") }}"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    jQuery(document).ready(function() {
        for(var i = 0; i < parseInt('{{$kodeetik_question_total}}');i++){
            var name= 'kodeetik_answer_'+i;
            $('#'+name).prop('checked', false);
        }
        $('#div_kodeetik_question_0').hide();
        // $('#btn_kodeetik_submit_0').show();
        $('#btn_kodeetik_next_awal').show();
        $('#title_sambutan').show();
        $('#title_pertanyaan').hide();
        $('#surat_pernyataan').hide();
        $('#div_detail_sudah').hide();
        $('#div_detail_belum').hide();
        $('#sudah_kode_etik').hide();
        $('#nama').html('{{$empsync[0]->name}}');
        $('#nama_bawah').html('{{$empsync[0]->name}}');
        $('#nik').html('{{$empsync[0]->employee_id}}');
        $('#grade').html('{{$empsync[0]->grade_code}}');
        $('#jabatan').html('{{$empsync[0]->position}}');

        if (parseInt('{{count($cek_kode_etik)}}') > 0) {
            $('#title_sambutan').hide();
            $('#div_detail_sudah').show();
            $('#surat_pernyataan').hide();
            $('#div_kodeetik_question_0').hide();
            $('#btn_kodeetik_submit_0').hide();
            $('#title_pertanyaan').hide();
        }
    });

    function submitKodeEtikQuestion(no) {

        var answer = '';
        $("input[name='kodeetik_answer_"+no+"']:checked").each(function (i) {
            answer = $(this).val();
        });
        if (answer != $("#kodeetik_right_answer_"+no).val()) {
            $('#kodeetik_announcement_'+no).html('Jawaban Anda Salah!<br>Silahkan baca jawaban benar.');
            $('#kodeetik_announcement_'+no).css("color", "red");
            $('#kodeetik_announcement_'+no).css("fontWeight", "bold");
            $('#btn_kodeetik_back_'+no).show();
            $('#div_kodeetik_discussion_'+no).show();
            $('#images_'+no).hide();
            $('#images_not_'+no).show();
            $('#btn_kodeetik_submit_'+no).hide();
            $('#div_kodeetik_question_'+no).hide();
        }else{
            $('#kodeetik_announcement_'+no).html('Jawaban Anda Benar!');
            $('#kodeetik_announcement_'+no).css("color", "green");
            $('#kodeetik_announcement_'+no).css("fontWeight", "bold");
            $('#div_kodeetik_discussion_'+no).show();
            $('#images_not_'+no).hide();
            $('#images_'+no).show();
            $('#btn_kodeetik_next_'+no).show();
            $('#btn_kodeetik_submit_'+no).hide();
            $('#div_kodeetik_question_'+no).hide();
        }
    }

    function backKodeEtikQuestion(no) {
        $('#kodeetik_announcement_'+no).html('');
        $('#kodeetik_announcement_'+no).css("color", "white");
        $('#btn_kodeetik_back_'+no).hide();
        $('#div_kodeetik_discussion_'+no).hide();
        $('#btn_kodeetik_submit_'+no).show();
        $('#div_kodeetik_question_'+no).show();
    }


    function nextKodeEtikAwal() {
        $('#btn_kodeetik_next_awal').hide();
        $('#title_sambutan').hide();
        $('#div_kodeetik_question_0').show();
        $('#btn_kodeetik_submit_0').show();
    }

    function nextKodeEtikQuestion(no) {
        $('#kodeetik_announcement_'+no).html('');
        $('#kodeetik_announcement_'+no).css("color", "white");
        $('#btn_kodeetik_back_'+no).hide();
        $('#btn_kodeetik_next_'+no).hide();
        $('#div_kodeetik_discussion_'+no).hide();
        $('#btn_kodeetik_submit_'+no).hide();
        $('#div_kodeetik_question_'+no).hide();

        $('#btn_kodeetik_submit_'+(parseInt(no)+1)).show();
        $('#div_kodeetik_question_'+(parseInt(no)+1)).show();

        if ((parseInt(no)+1) == '{{$kodeetik_question_total}}') {

            $('#div_pertanyaan').hide();

            // $('#btn_kodeetik_submit_all').show();
            $('#surat_pernyataan').hide();
            $('#title_pertanyaan').hide();

            var question = [];
            var answers = [];


            for(var i = 0; i < parseInt('{{$kodeetik_question_total}}');i++){
                var answer = '';
                $("input[name='kodeetik_answer_"+i+"']:checked").each(function (i) {
                    answer = $(this).val();
                });
                answers.push(answer);
                question.push($('#kodeetik_question_'+i).html());
            }

            var data = {
                employee_id : $('#employee_id').val(),
                question:question,
                answer:answers
            }

            $.get('{{ url("kodeetik/input") }}', data, function(result, status, xhr){
                if(result.status == true){    
                    $("#loading").hide();
                    openSuccessGritter("Success","Berhasil Disimpan");
                    $("#tanggal_kode_etik").html(result.datetime);
                    $('#div_detail_sudah').show();
                }
                else {
                    $("#loading").hide();
                    openErrorGritter('Error!', result.datas);
                }
            })




        }
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
