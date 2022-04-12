<?php $__env->startSection('stylesheets'); ?>
<link href="<?php echo e(url("css/jquery.gritter.css")); ?>" rel="stylesheet">
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
<?php $__env->stopSection(); ?>


<?php $__env->startSection('content'); ?>

<section class="section colored" id="laporan-kesehatan">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
                    <h2 class="section-title" style="background-color:#955ddf;color:white;margin-bottom: 0px;border-top-left-radius: 10px;border-top-right-radius: 10px;font-size: 15px">LAPORAN KESEHATAN</h2>
                    <h4 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px"><?= $empsync[0]->employee_id ?> - <?= $empsync[0]->name ?></h4>
                    <input type="hidden" name="employee_id" id="employee_id" value="<?php echo e($empsync[0]->employee_id); ?>">
                    <input type="hidden" name="name" id="name" value="<?php echo e($empsync[0]->name); ?>">
                    <input type="hidden" name="department" id="department" value="<?php echo e($empsync[0]->department); ?>">
                </div>
                <div class="contact-form" style="background-color: white;padding: 20px;border-radius: 10px">
                    <!-- <form class="contact100-form validate-form" id="form_survey"> -->
                        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <fieldset>
                                <span id="pertanyaan0">Demam</span>
                            </fieldset>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                          <fieldset>
                            <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                                <input type="radio" id="jawaban0" name="jawaban0" value="Iya" required="">
                                <span class="checkmark"></span>
                            </label>
                            <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                                <input type="radio" id="jawaban0" name="jawaban0" value="Tidak" required="">
                                <span class="checkmark"></span>
                            </label>
                        </fieldset>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <fieldset>
                        <span id="pertanyaan1">Batuk</span>
                        </fieldset>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                        <fieldset>
                        <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                            <input type="radio" id="jawaban1" name="jawaban1" value="Iya" required="">
                            <span class="checkmark"></span>
                        </label>
                        <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                            <input type="radio" id="jawaban1" name="jawaban1" value="Tidak" required="">
                            <span class="checkmark"></span>
                        </label>
                        </fieldset>
                    </div>

                            <div class="col-lg-6 col-md-6 col-sm-6">
                              <fieldset>
                                <span id="pertanyaan2">Pusing</span>
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                                      <fieldset>
                                        <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                                            <input type="radio" id="jawaban2" name="jawaban2" value="Iya" required="">
                                            <span class="checkmark"></span>
                                        </label>
                                        <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                                            <input type="radio" id="jawaban2" name="jawaban2" value="Tidak" required="">
                                            <span class="checkmark"></span>
                                        </label>
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                  <fieldset>
                                    <span id="pertanyaan3">Tenggorokan Sakit</span>
                                </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                                  <fieldset>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                                        <input type="radio" id="jawaban3" name="jawaban3" value="Iya" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                                        <input type="radio" id="jawaban3" name="jawaban3" value="Tidak" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <fieldset>
                                        <span id="pertanyaan4">Sesak Nafas</span>
                                    </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                                  <fieldset>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                                        <input type="radio" id="jawaban4" name="jawaban4" value="Iya" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                                        <input type="radio" id="jawaban4" name="jawaban4" value="Tidak" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                  <fieldset>
                                    <span id="pertanyaan5">Indera Perasa & Penciuman Terganggu</span>
                                </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                                  <fieldset>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                                        <input type="radio" id="jawaban5" name="jawaban5" value="Iya" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                                        <input type="radio" id="jawaban5" name="jawaban5" value="Tidak" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6">
                                  <fieldset>
                                    <span id="pertanyaan6">Pernah Berinteraksi dengan Suspect / Positif COVID-19</span>
                                </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                                  <fieldset>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Iya
                                        <input type="radio" id="jawaban6" name="jawaban6" value="Iya" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio" style="margin-top: 5px;margin-left: 5px">Tidak
                                        <input type="radio" id="jawaban6" name="jawaban6" value="Tidak" required="">
                                        <span class="checkmark"></span>
                                    </label>
                                </fieldset>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top:10px">
                                  <fieldset>
                                    <span id="pertanyaan_suhu">Suhu Tubuh</span>
                                </fieldset>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6" style="margin-top:10px">
                                  <fieldset>
                                    <input type="hidden" id="jml_pertanyaan" value="7">
                                    <input id="suhu" name="suhu" type="text" class="form-control" placeholder="Suhu Tubuh (Contoh: 37.5)" required="">
                                </fieldset>
                                </div>
                                <!-- <div class="col-lg-12">
                                  <fieldset>
                                    <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                                  </fieldset>
                              </div> -->
                              <div class="col-lg-12">
                                  <fieldset>
                                    <button  class="main-button" onclick="submitForm()">Submit</button>
                                </fieldset>
                            </div>
                        </div>
                    <!-- </form> -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('scripts'); ?>
<script src="<?php echo e(url("bower_components/jquery/dist/jquery.min.js")); ?>"></script>
<script src="<?php echo e(url("bower_components/bootstrap/dist/js/bootstrap.min.js")); ?>"></script>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(url("js/jquery.gritter.min.js")); ?>"></script>
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function submitForm() {
        $("#loading").show();

        var jumlah_pertanyaan = $("#jml_pertanyaan").val();
        var pertanyaan = [];
        var jawaban = [];
        
        if($("#suhu").val() == "" ){
            $("#loading").hide();
            openErrorGritter('Error!', 'Suhu Harus Diisi.');
            $("html").scrollTop(0);
            return false;
        }

        for(var i = 0;i<jumlah_pertanyaan; i++){
            var question = '#pertanyaan'+i;
            pertanyaan.push($(question).text());

            var answer = 'jawaban'+i;

            if ($('input[id="'+answer+'"]:checked').val() == null) {
                $("#loading").hide();
                openErrorGritter('Error!', 'Semua Kolom Bertanda Bintang (<b>*</b>) Harus Diisi.');
                $("html").scrollTop(0);
                return false;
            }
            
            

            jawaban.push($('input[id="'+answer+'"]:checked').val());
            
        }

        pertanyaan.push($('#pertanyaan_suhu').text());
        jawaban.push($('#suhu').val());

        // if ($('#latitude').val() == "") {
        //  $("#loading").hide();
        //  openErrorGritter('Error!', 'Perbolehkan Sistem Mengakses Lokasi Anda');
        //  $("html").scrollTop(0);
        //  return false;
        // }

        // if ($('#longitude').val() == "") {
        //  $("#loading").hide();
        //  openErrorGritter('Error!', 'Perbolehkan Sistem Mengakses Lokasi Anda');
        //  $("html").scrollTop(0);
        //  return false;
        // }

        // console.log(pertanyaan);
        // console.log(jawaban);

        var data = {
            employee_id: $("#employee_id").val(),
            name: $("#name").val(),
            department: $("#department").val(),
            question: pertanyaan,
            answer: jawaban,
            jumlah_pertanyaan : jumlah_pertanyaan,
            // latitude : $("#latitude").val(),
            // longitude : $("#longitude").val(),
        };

        $.get('<?php echo e(url("laporan_kesehatan/input")); ?>', data, function(result, status, xhr){
            if(result.status == true){    
                $("#loading").hide();
                alert(result.message);
                // location.reload();
                window.location.replace("<?php echo e(url('home')); ?>");
            }
            else {
                $("#loading").hide();
                alert(result.message);
            }
        });
    }

    function openSuccessGritter(title, message){
        jQuery.gritter.add({
            title: title,
            text: message,
            class_name: 'growl-success',
            image: '<?php echo e(url("images/image-screen.png")); ?>',
            sticky: false,
            time: '2000'
        });
    }

    function openErrorGritter(title, message) {
        jQuery.gritter.add({
            title: title,
            text: message,
            class_name: 'growl-danger',
            image: '<?php echo e(url("images/image-stop.png")); ?>',
            sticky: false,
            time: '2000'
        });
    }

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>