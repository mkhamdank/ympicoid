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
                    <h2 class="section-title" style="background-color:#955ddf;color:white;margin-bottom: 0px;border-top-left-radius: 10px;border-top-right-radius: 10px;font-size: 15px">PERJANJIAN KERJA BERSAMA (PKB)</h2>
                    <!-- <h4 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px"><?= $empsync[0]->employee_id ?> - <?= $empsync[0]->name ?></h4> -->
                    <h4 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px">PERIODE {{$periode}}</h4>
                    <input type="hidden" name="employee_id" id="employee_id" value="{{$empsync[0]->employee_id}}">
                    <input type="hidden" name="name" id="name" value="{{$empsync[0]->name}}">
                    <input type="hidden" name="department" id="department" value="{{$empsync[0]->department}}">
                </div>
                <div class="contact-form" style="background-color: white;padding: 15px;border-radius: 10px">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="periode" id="periode" value="{{$periode}}">
                    <center id="title_pertanyaan">
                        <span class="center-heading" style="padding-bottom: 15px;text-align: center;font-weight: bold;font-size: 18px">
                            PERTANYAAN
                        </span>
                    </center>
                    <div class="row">
                        <?php $pkb_question_total = count($pkb_question) ?>
                        <?php if (count($pkb_question) > 0): ?>
                            <?php $no = 0; ?>
                            @foreach($pkb_question as $pkb_question)
                            <div id="div_pkb_question_<?= $no ?>" style="display: none;width: 100%;padding: 15px;" class="col-xs-12">
                                <label class="label-input1002" style="color: purple;margin-top: 0px;font-size: 14px"><span id="pkb_question_<?= $no ?>">{{$no+1}}. {{ $pkb_question->question }}</span></label>

                                <?php $pkb_answer = explode('_', $pkb_question->answer) ?>

                                <?php for ($i=0; $i < count($pkb_answer); $i++) { ?>
                                    <div class="validate-input" style="position: relative; width: 100%">
                                        <label class="radio_box" style="margin-top: 5px;font-size: 12px">{{$pkb_answer[$i]}}
                                            <input type="radio" id="pkb_answer_{{$no}}" name="pkb_answer_{{$no}}" value="{{$pkb_answer[$i]}}">
                                            <span class="checkmark_box"></span>
                                        </label>
                                    </div>
                                <?php } ?>
                                <input type="hidden" name="pkb_right_answer_{{$no}}" id="pkb_right_answer_{{$no}}" value="{{$pkb_question->right_answer}}">
                                <br>
                            </div>
                            <div id="div_pkb_discussion_<?= $no ?>" style="display: none;width: 100%;padding: 15px;" class="col-xs-12 discussion">
                                <center><span id="pkb_announcement_<?= $no ?>" style="font-weight: bold;font-size: 20px"></span></center>
                                <br>
                                <center><span style="font-weight: bold;font-size: 20px">Pembahasan</span></center>
                                <span><?php echo $pkb_question->discussion ?></span>
                                <br>
                            </div>
                            <button class="main-button" type="button" id="btn_pkb_submit_<?= $no ?>" onclick="submitPkbQuestion('{{$no}}')" style="display: inline-block;float: right;display: none;margin: 20px">
                                <span>
                                    Submit
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </button>
                            <button class="main-button" type="button" id="btn_pkb_back_<?= $no ?>" onclick="backPkbQuestion('{{$no}}')" style="display: inline-block;float: right;display: none;background-color: red;margin: 20px">
                                <span>
                                    <i class="fa fa-arrow-left"></i>
                                    Back
                                </span>
                            </button>
                            <button class="main-button" type="button" id="btn_pkb_next_<?= $no ?>" onclick="nextPkbQuestion('{{$no}}')" style="display: inline-block;float: right;display: none;margin: 20px">
                                <span>
                                    Next
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </button>
                            <?php $no++ ?>
                            @endforeach
                        <?php endif ?>
                        <!-- <div class="col-lg-12">
                              <fieldset>
                                <button  class="main-button" onclick="submitForm()">Submit</button>
                            </fieldset>
                        </div> -->
                    </div>
                    <div class="row" id="surat_pernyataan" style="padding: 10px">

                        <input type="hidden" value="{{csrf_token()}}" name="_token" />
                        <div id="div_detail" class="col-xs-12" style="width: 100%">
                            <center>
                                <span class="contact100-form-title" style="padding-bottom: 15px;text-align: center;font-size: 18px;text-decoration: underline;">
                                    SURAT PERNYATAAN
                                </span>
                            </center>
                            <table>
                                <tr>
                                    <td colspan="3">Saya yang bertandatangan di bawah ini :</td>
                                </tr>
                                <tr>
                                    <td style="width: 3%">Nama</td>
                                    <td style="width: 1%">:</td>
                                    <td style="width: 20%"><span id="nama"></span></td>
                                </tr>
                                <tr>
                                    <td>NIK</td>
                                    <td>:</td>
                                    <td><span id="nik"></span></td>
                                </tr>
                                <tr>
                                    <td>Grade /<br>Jabatan</td>
                                    <td>:</td>
                                    <td><span id="grade"></span> / <span id="jabatan"></span></td>
                                </tr>
                                <tr>
                                    <td>Bagian</td>
                                    <td>:</td>
                                    <td><span id="department_pkb"></span></td>
                                </tr>
                            </table>
                            <br>    
                            Menyatakan dengan sebenarnya bahwa saya telah menerima buku, membaca <br>
                            dan mengerti isi Perjanjian Kerja Bersama ini. <br>
                            Demikian pernyataan ini saya buat dengan sebenar-benarnya dan tanpa ada paksaan <br>
                            dari pihak manapun. <br>
                            <br>
                            <br>
                            Pasuruan, {{date('d F Y')}}
                            <br>
                            <br>
                            <label class="container_checkmark" style="color: green">Menyetujui
                                <input type="checkbox" name="persetujuan" value="Menyetujui" checked="true">
                                <span class="checkmark_checkmark"></span>
                            </label>
                            <br>

                            <span id="nama_bawah" style="text-decoration: underline;"></span>
                            <br>
                        </div>

                        <div class="col-xs-12" style="width: 100%">
                            <button class="main-button" type="button" onclick="savePkb()" style="display: inline-block;margin-top: 20px">
                                <span>
                                    Submit
                                    <i class="fa fa-arrow-right"></i>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div id="div_detail_belum" style="margin-top: 20px">
                        <center><span style="font-size: 18px;text-align: center;font-weight: bold;">
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            Maaf, fitur ini masih dalam pengembangan.
                        </span></center>
                    </div>

                    <div id="div_detail_sudah" style="margin-top: 20px">
                        <center><span style="font-size: 18px;text-align: center;color: green">
                            <?php date_default_timezone_set('Asia/Jakarta'); ?>
                            Terimakasih, Anda telah menyetujui <br><span style="font-weight: bold;">Surat Pernyataan</span><br> pada<br>
                            <?php if (ISSET($cek_pkb) && $cek_pkb != null){ ?>
                                <span id="tanggal_pkb" style="font-weight: bold;">{{$cek_pkb->created_at}}</span>
                            <?php }else{ ?>
                                <span id="tanggal_pkb" style="font-weight: bold;"></span>
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
        for(var i = 0; i < parseInt('{{$pkb_question_total}}');i++){
            var name= 'pkb_answer_'+i;
            $('#'+name).prop('checked', false);
        }
        $('#div_pkb_question_0').show();
        $('#btn_pkb_submit_0').show();
        $('#title_pertanyaan').show()
        $('#surat_pernyataan').hide();
        $('#div_detail_sudah').hide();
        $('#div_detail_belum').hide();
        $('#nama').html('{{$empsync[0]->name}}');
        $('#nama_bawah').html('{{$empsync[0]->name}}');
        $('#nik').html('{{$empsync[0]->employee_id}}');
        $('#department_pkb').html('{{$empsync[0]->department}}');
        $('#grade').html('{{$empsync[0]->grade_code}}');
        $('#jabatan').html('{{$empsync[0]->position}}');

        if (parseInt('{{count($cek_pkb)}}') > 0) {
            $('#div_detail_sudah').show();
            $('#div_detail_belum').hide();
            $('#surat_pernyataan').hide();
            $('#div_pkb_question_0').hide();
            $('#btn_pkb_submit_0').hide();
            $('#title_pertanyaan').hide();
        }
    });

    function submitPkbQuestion(no) {
        var answer = '';
        $("input[name='pkb_answer_"+no+"']:checked").each(function (i) {
            answer = $(this).val();
        });
        if (answer != $("#pkb_right_answer_"+no).val()) {
            $('#pkb_announcement_'+no).html('Jawaban Anda Salah!<br>Silahkan baca pembahasan berikut.');
            $('#pkb_announcement_'+no).css("color", "red");
            $('#pkb_announcement_'+no).css("fontWeight", "bold");
            $('#btn_pkb_back_'+no).show();
            $('#div_pkb_discussion_'+no).show();
            $('#btn_pkb_submit_'+no).hide();
            $('#div_pkb_question_'+no).hide();
        }else{
            $('#pkb_announcement_'+no).html('Jawaban Anda Benar!');
            $('#pkb_announcement_'+no).css("color", "green");
            $('#pkb_announcement_'+no).css("fontWeight", "bold");
            $('#div_pkb_discussion_'+no).show();
            $('#btn_pkb_next_'+no).show();
            $('#btn_pkb_submit_'+no).hide();
            $('#div_pkb_question_'+no).hide();
        }
    }

    function backPkbQuestion(no) {
        $('#pkb_announcement_'+no).html('');
        $('#pkb_announcement_'+no).css("color", "white");
        $('#btn_pkb_back_'+no).hide();
        $('#div_pkb_discussion_'+no).hide();
        $('#btn_pkb_submit_'+no).show();
        $('#div_pkb_question_'+no).show();
      }

      function nextPkbQuestion(no) {
        $('#pkb_announcement_'+no).html('');
        $('#pkb_announcement_'+no).css("color", "white");
        $('#btn_pkb_back_'+no).hide();
        $('#btn_pkb_next_'+no).hide();
        $('#div_pkb_discussion_'+no).hide();
        $('#btn_pkb_submit_'+no).hide();
        $('#div_pkb_question_'+no).hide();

        $('#btn_pkb_submit_'+(parseInt(no)+1)).show();
        $('#div_pkb_question_'+(parseInt(no)+1)).show();

        if ((parseInt(no)+1) == '{{$pkb_question_total}}') {
            $('#div_pertanyaan').hide();
            $('#btn_pkb_submit_all').show();
            $('#surat_pernyataan').show();
            $('#title_pertanyaan').hide()
            alert('Anda berhasil menyelesaikan pertanyaan PKB Periode '+'{{$periode}}'+'. Silahkan Sign SURAT PERNYATAAN berikut.');
        }
      }
    function savePkb() {
        $("#loading").show();

        var persetujuan = [];
        $("input[name='persetujuan']:checked").each(function (i) {
            persetujuan[i] = $(this).val();
        });

        var question = [];
        var answers = [];

        if (persetujuan.length == 0) {
            $("#loading").hide();
            openErrorGritter('Error!', 'Persetujuan Harus Diisi..');
            return false;
        }

        for(var i = 0; i < parseInt('{{$pkb_question_total}}');i++){
            var answer = '';
            $("input[name='pkb_answer_"+i+"']:checked").each(function (i) {
                answer = $(this).val();
            });
            answers.push(answer);
            question.push($('#pkb_question_'+i).html());
        }

        var data = {
            employee_id : $('#employee_id').val(),
            persetujuan : persetujuan[0],
            periode:'{{$periode}}',
            question:question,
            answer:answers
        }

        $.get('{{ url("pkb/input") }}', data, function(result, status, xhr){
            if(result.status == true){    
                $("#loading").hide();
                alert("Berhasil Menyetujui");
                $("#div_detail_sudah").show();
                $("#tanggal_pkb").html(result.datetime);
                $("#div_detail").hide();
                $("#surat_pernyataan").hide();
                $("#div_detail_belum").hide();
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