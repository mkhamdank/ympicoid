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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<section class="section colored" id="survey-covid">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
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
                    
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="contact-form">
                    <form class="validate-form" id="stocktaking_survey_form" style="display: none;">
                        <div style="width: 100%;">
                            <?php echo e(csrf_field()); ?>

                            <div class="col-xs-12 col-md-12 col-lg-12" style="padding:0">
                                <?php 
                                $stocktaking_survey_count = count($question);
                                 ?>
                                <input type="hidden" id="stocktaking_survey_count" value="<?php echo e($stocktaking_survey_count); ?>">
                                <input type="hidden" id="employee_id" value="<?php echo e(Auth::user()->username); ?>">

                                <table id="tableStocktakingSurvey" class="table table-bordered" style="overflow-x: scroll ;border-collapse: collapse !important; width: 100%">
                                    <thead>
                                        <tr style="background-color: #945de0;color: white">
                                            <th>PENILAIAN PEMAHAMAN USER TERKAIT STOCKTAKING</th>                                            
                                        </tr>
                                    </thead>
                                    <tbody id="" style="background-color: #fff;">

                                        <?php  $no = 0;  ?>
                                        <?php $__currentLoopData = $question; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $qs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                        
                                        <tr class="stocktaking_tab_<?php echo e($no+1); ?>" id="stocktaking_tab_<?php echo e($no+1); ?>">
                                            <td>
                                                <center>
                                                    <img style="max-width: 70%;" id="image_question_<?php echo e($no+1); ?>" src="<?php echo e(url( 'images/stocktaking/' . $qs->image )); ?>" alt="<?php echo e($qs->image); ?>">
                                                </center>
                                                <label class="label-input1002" style="color: purple; margin-top: 0px; text-align: center; font-size: 14px"><span id="survey_question_<?php echo e($no); ?>"><?php echo e($qs->question); ?></span>
                                                </label>

                                                <div class="validate-input" style="position: relative; width: 100%">
                                                    <label class="radio_box" style="margin-top: 5px">Ya
                                                        <input type="radio" id="survey_answer_<?php echo e($no); ?>" name="survey_answer_<?php echo e($no); ?>" value="Ya">
                                                        <span class="checkmark_box"></span>
                                                    </label>

                                                    <label class="radio_box" style="margin-top: 5px">Tidak
                                                        <input type="radio" id="survey_answer_<?php echo e($no); ?>" name="survey_answer_<?php echo e($no); ?>" value="Tidak">
                                                        <span class="checkmark_box"></span>
                                                    </label>
                                                </div>
                                                <div class="validate-input" style="position: relative; width: 100%">
                                                    <?php if($no+1 != 1): ?>
                                                    <button id="back_<?php echo e($no+1); ?>" class="btn btn-default" onclick="backSurveyStocktaking(this.id)" style="display: inline-block; border-color: #cccccc">
                                                        <span><i class="fa fa-arrow-left"></i>&nbsp;Back</span>
                                                    </button>
                                                    <?php endif; ?>
                                                    <?php if($no+1 != $stocktaking_survey_count): ?>
                                                    <button id="next_<?php echo e($no+1); ?>" class="btn btn-primary" onclick="nextSurveyStocktaking(this.id)" style="display: inline-block; float: right">
                                                        <span>Next&nbsp;<i class="fa fa-arrow-right"></i></span>
                                                    </button>
                                                    <?php else: ?>
                                                    <button class="btn btn-success" onclick="submitSurveyStoctaking()" style="display: inline-block; float: right;">
                                                        <span>Submit<i class="fa fa-arrow-right"></i></span>
                                                    </button>
                                                    <?php endif; ?>
                                                </div>

                                                <?php if($no+1 == 1): ?>
                                                <div class="validate-input" style="width: 100%;">
                                                    <span style="font-weight: bold; margin-top: 40px;">Page <?php echo e($no+1); ?> of <?php echo e($stocktaking_survey_count); ?></span>
                                                </div>
                                                <?php else: ?>
                                                <div class="validate-input" style="width: 100%;">
                                                    <span style="font-weight: bold; margin-top: 20px; float: right;">Page <?php echo e($no+1); ?> of <?php echo e($stocktaking_survey_count); ?></span>
                                                </div>
                                                <?php endif; ?>
                                                <?php  $no++;  ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>

                    <form class="validate-form" style="padding: 0px 25px 58px 25px; display: none" id="stocktaking_survey_finish">
                        <div style="width: 100%;">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <center style="font-size:16px">
                                    Terimakasih anda telah mengisi survey stocktaking pada <span style="color: red"><div id="stocktaking_survey_time"></div></span>
                                </center>
                            </div>
                        </div>
                    </form>

                    <form class="validate-form" style="padding: 0px 25px 58px 25px; display: none" id="stocktaking_survey_not_yet">
                        <div style="width: 100%;">
                            <div class="col-xs-12 col-md-12 col-lg-12">
                                <center style="font-size:16px">
                                    Hai <span id="name"></span><br>
                                    Survey dapat diisi mulai <span style="color: red;" id="survey_date"></span>
                                </center>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>

<script src="<?php echo e(url("js/jquery.gritter.min.js")); ?>"></script>
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
            employee_id : "<?php echo e(Auth::user()->username); ?>"
        }

        $.get('<?php echo e(url("fetch/check_survey_stocktaking")); ?>', data, function(result, status, xhr){
            if (result.status) {

                $('#name').text(result.employee.name);
                $('#survey_date').text(result.survey_date);


                var date = result.date;

                if (date >= 1 && date <= 31) {

                    if(result.cek_stocktaking_survey.length > 0) {
                        $('#stocktaking_survey_form').hide();
                        $('#stocktaking_survey_finish').show();
                        $("#stocktaking_survey_not_yet").hide();

                        $('#stocktaking_survey_time').html(result.cek_stocktaking_survey[0].created_at);
                    }else{
                        $('#stocktaking_survey_form').show();
                        $('#stocktaking_survey_finish').hide();
                        $("#stocktaking_survey_not_yet").hide();

                    }

                    hideAll();

                }else{
                    $("#stocktaking_survey_form").hide();
                    $("#stocktaking_survey_finish").hide();
                    $("#stocktaking_survey_not_yet").show();
                    hideAll();

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

        console.log(data);
        return false;

        $.post('<?php echo e(url("input/survey_stocktaking")); ?>', data, function(result, status, xhr){
            if(result.status == true){    
                $("#loading").hide();
                $("#stocktaking_survey_form").hide();
                $("#stocktaking_survey_finish").show();
                $("#stocktaking_survey_not_yet").hide();

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