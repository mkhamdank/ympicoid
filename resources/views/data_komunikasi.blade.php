@extends('layouts.master')

@section('stylesheets')

<link href="{{ url("css/jquery.gritter.css") }}" rel="stylesheet">
<link href="{{ url("css/dataTables.bootstrap4.min.css") }}" rel="stylesheet">
<link rel="stylesheet" href="{{ url("css/buttons.dataTables.min.css")}}">
<!-- <link rel="stylesheet" href="{{ url("bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css")}}"> -->
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
    input[type=number] {
        -moz-appearance:textfield; /* Firefox */
    }

    /* Hide the browser's default radio button */
    .radio input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .dataTables_filter {
        text-align: left !important;
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
                <div class="center-heading" id="div_title">
                    <h2 class="section-title" style="background-color:#955ddf;color:white;margin-bottom: 0px;border-top-left-radius: 10px;border-top-right-radius: 10px;font-size: 15px">Data Komunikasi lebaran</h2>
                    <!-- <h3 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px"><?= $empsync[0]->employee_id ?> - <?= $empsync[0]->name ?></h3> -->
                </div>
                <!-- <div class="contact-form" id="div_edit">
                </div> -->
                @if(count($mudik) > 0)
                @if($mudik->rencana_mudik != null)
                @if($mudik->departure == null || $mudik->arrived == null)
                    @if(count($vaksin) > 0)
                            @if($vaksin->vaksin_3 == null && $vaksin->vaksin_2 != null && $vaksin->vaksin_1 != null)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="padding-right: 8px;">Anda terdeteksi mudik dan belum melaksanakan Vaksin 3. Silahkan lampirkan hasil test Rapid Antigen saat akan berangkat dan kembali. Tekan tombol di sebelah kanan untuk upload data.</td>
                                            <td><a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('mudik/rapid')}}">Rapid</a></td>
                                        </tr>
                                    </table>
                                </div>
                            @elseif($vaksin->vaksin_3 == null && $vaksin->vaksin_2 == null && $vaksin->vaksin_1 != null)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="padding-right: 8px;">Anda terdeteksi mudik dan belum melaksanakan Vaksin 2 & Vaksin 3. Silahkan lampirkan hasil test PCR saat akan berangkat dan kembali. Tekan tombol di sebelah kanan untuk upload data.</td>
                                            <td><a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('mudik/pcr')}}">PCR</a></td>
                                        </tr>
                                    </table>
                                </div>
                             @elseif($vaksin->vaksin_3 == null && $vaksin->vaksin_2 == null && $vaksin->vaksin_1 == null)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="padding-right: 8px;">Anda terdeteksi mudik dan belum melaksanakan Vaksin. Silahkan lampirkan hasil test PCR saat akan berangkat dan kembali. Tekan tombol di sebelah kanan untuk upload data.</td>
                                            <td><a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('mudik/pcr')}}">PCR</a></td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #57ff3d;color: black;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td rowspan="2" style="padding-right: 8px;">Anda sudah melaksanakan Vaksin 3 (Booster). Tetap terapkan protokol kesehatan dan lindungi keluarga Anda.</td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                            <table style="width: 100%">
                                <tr>
                                    <td rowspan="2" style="padding-right: 8px;">Anda terdeteksi mudik dan belum melaksanakan Vaksin. Silahkan lampirkan hasil test PCR saat akan berangkat dan kembali. Tekan tombol di sebelah kanan untuk upload data.</td>
                                    <td><a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('mudik/pcr')}}">PCR</a></td>
                                    <td>
                                        <a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('vaksin')}}">Vaksin</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endif
                @endif
                @endif
                @endif
                <div class="contact-form" style="background-color: white;padding: 20px;border-radius: 10px" id="div_data">
                   <div class="row">
                        <div class="offset-lg-3 col-lg-6">
                            <div class="center-text">
                                <p>Form ini digunakan untuk mengumpulkan data Komunikasi Saat Lebaran</p>
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

                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                      <fieldset>
                                        <input type="number" class="form-control" id="no_hp" name="no_hp" placeholder="Nomor HP (Wajib)">
                                      </fieldset>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                      <fieldset>
                                        <input type="number" class="form-control" id="no_telp" name="no_telp" placeholder="Nomor Telepon Rumah">
                                      </fieldset>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                      <fieldset>
                                        <input type="number" class="form-control" id="no_alternatif" name="no_alternatif" placeholder="Nomor Alternatif (Wajib)">
                                      </fieldset>
                                    </div>


                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                      <!-- <fieldset> -->
                                        <select class="form-control" title="Identitas Nomor Alternatif (Wajib)" name="hubungan" id="hubungan" data-hidden="true">
                                            <option value="" selected="" disabled>Identitas Nomor Alternatif (Wajib)</option>
                                            <option value="Orang Tua">Orang Tua</option>
                                            <option value="Suami atau Istri">Suami atau Istri</option>
                                            <option value="Anak">Anak</option>
                                            <option value="Saudara">Saudara</option>
                                            <option value="Teman">Teman</option>
                                        </select>
                                        <!-- </fieldset> -->
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12" style="margin-top:20px">
                                        <div class="center-text" style="margin-bottom:25px">
                                            <p>Rencana Mudik</p>
                                        </div>
                                    </div>

                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <fieldset>
                                            <input type="text" class="form-control" id="rencana_mudik" name="rencana_mudik" placeholder="Kota Tujuan">
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Berangkat</label>
                                        <fieldset>
                                            <input type="date" class="form-control datepicker" id="tanggal_berangkat" name="tanggal_berangkat" placeholder="Tanggal Berangkat">
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-6 col-md-12 col-sm-12">
                                        <label class="label-input1002" style="color: purple;margin-top: 20px;font-size: 14px">Tanggal Kembali</label>
                                        <fieldset>
                                            <input type="date" class="form-control datepicker" id="tanggal_kembali" name="tanggal_kembali" placeholder="Tanggal Kembali">
                                        </fieldset>
                                    </div>

                                    <div class="col-lg-12" style="margin-top: 20px">
                                      <fieldset>
                                        <button class="main-button" onclick="save()">Submit</button>
                                        <a class="main-button pull-right" href="javascript:void(0)" onclick="cancel()" style="background-color: red" id="btn_cancel">Cancel</a>
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

            <div class="col-lg-12" style="margin-top:20px;">
                <div class="center-heading">
                    <h2 class="section-title" style="background-color:#955ddf;color:white;margin-bottom: 0px;border-top-left-radius: 10px;border-top-right-radius: 10px;font-size: 15px">Data Report Komunikasi Lebaran<br>{{$empsync[0]->department}}</h2>
                    <!-- <h3 class="section-title" style="background-color: white;font-size: 12px;border-bottom-left-radius: 10px;border-bottom-right-radius: 10px;margin-bottom: 10px">PI1910003 - Rio Irvansyah</h3> -->
                </div>
                <div class="contact-form" style="background-color: white;padding: 20px;border-radius: 10px">
                    <div class="row">
                        <!-- ***** Contact Form Start ***** -->
                        <div class="col-lg-12 col-md-12 col-sm-12" style="margin-bottom: 10px">
                            <button class="main-button pull-right" onclick="edit()" id="btn_edit">Edit Data Saya</button>
                        </div>

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <div class="contact-form">
                                  <div class="row" style="overflow-x: scroll;">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                      <fieldset>
                                        <table id="example1" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>NIK</th>
                                                    <th>Nama</th>
                                                    <th>Dept</th>
                                                    <th>Posisi</th>
                                                    <th>Nomor HP</th>
                                                    <th>Nomor Alternatif</th>
                                                    <th>Kota Mudik</th>
                                                    <th>Tanggal Berangkat</th>
                                                    <th>Tanggal Kembali</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($communication as $comm)
                                                <tr>
                                                    <td>{{ $comm->employee_id }}</td>
                                                    <td>{{ $comm->name }}</td>
                                                    <td>{{ $comm->department_shortname }}</td>
                                                    <td>{{ $comm->position }}</td>
                                                    <td>{{ $comm->no_hp }}</td>
                                                    <td>{{ $comm->no_alternatif }}</td>
                                                    <td>{{ $comm->rencana_mudik }}</td>
                                                    <td>{{ $comm->tanggal_berangkat }}</td>
                                                    <td>{{ $comm->tanggal_kembali }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
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
<script src="{{ url("js/jquery.dataTables.min.js") }}"></script>
<script src="{{ url("js/dataTables.bootstrap4.min.js") }}"></script>
<script src="{{ url("js/jquery.flot.min.js") }}"></script>
<script src="{{ url("js/dataTables.buttons.min.js")}}"></script>
<script src="{{ url("js/buttons.flash.min.js")}}"></script>
<script src="{{ url("js/jszip.min.js")}}"></script>
<script src="{{ url("js/vfs_fonts.js")}}"></script>
<script src="{{ url("js/buttons.html5.min.js")}}"></script>
<script src="{{ url("js/buttons.print.min.js")}}"></script>
<!-- <script src="{{ url("bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js")}}"></script> -->
<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    jQuery(document).ready(function() {
        // console.log();
        if (parseInt('{{count($employee)}}') > 0) {
            var employee = JSON.parse('<?php echo $employee ?>');
            $('#no_hp').val(employee.no_hp);
            $('#no_telp').val(employee.no_telp);
            $('#no_alternatif').val(employee.no_alternatif);
            $('#hubungan').val(employee.keterangan).trigger('change');
            $('#rencana_mudik').val(employee.rencana_mudik);
            $('#tanggal_berangkat').val(employee.tanggal_berangkat);
            $('#tanggal_kembali').val(employee.tanggal_kembali);
            $('#btn_cancel').show();
            $('#div_data').hide();
            $('#div_title').hide();
            $('#btn_edit').show();
        }else{
            $('#btn_cancel').hide();
            $('#div_title').show();
            $('#div_data').show();
            $('#btn_edit').hide();
        }
        // $('').datepicker({
        //     <?php $tgl_max = date('Y-m-d') ?>
        //     autoclose: true,
        //     format: "yyyy-mm-dd",
        //     todayHighlight: true,   
        //     orientation: "bottom",
        // });

      //   $('#example1 tfoot th').each( function () {
      //   var title = $(this).text();
      //   $(this).html( '<input style="text-align: center;" type="text" placeholder="Search '+title+'" size="20"/>' );
      // } );
      var table = $('#example1').DataTable({
        "order": [],
        // 'dom': 'Bfrtip',
        'responsive': true,
        'paging' : true,
        'lengthMenu': [
        [ 10, 25, 50, -1 ],
        [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        'buttons': false
      });

      // table.columns().every( function () {
      //   var that = this;

      //   $( 'input', this.footer() ).on( 'keyup change', function () {
      //     if ( that.search() !== this.value ) {
      //       that
      //       .search( this.value )
      //       .draw();
      //     }
      //   } );
      // } );

      // $('#example1 tfoot tr').appendTo('#example1 thead');

    });

    function edit() {
        $("#div_data").show();
        $("#div_title").show();
        $('#btn_cancel').show();
        $('#btn_edit').hide();
    }

    function cancel() {
        $("#div_data").hide();
        $("#div_title").hide();
        $('#btn_cancel').hide();
        $('#btn_edit').show();
    }

    function save() {
        $("#loading").show();

        if($('#no_hp').val() == "") {
            $("#loading").hide();
            openErrorGritter('Error!', 'Nomor HP Harus Diisi.');
            return false;
        }

        else if($('#no_alternatif').val() == "") {
            $("#loading").hide();
            openErrorGritter('Error!', 'Nomor Alternatif Harus Diisi.');
            return false;
        }

        else if($('#hubungan').val() == null) {
            $("#loading").hide();
            openErrorGritter('Error!', 'Hubungan Keluarga Harus Diisi.');
            return false;
        }

        var data = {
            employee_id : $('#employee_id').val(),
            name : $('#name').val(),
            department : $('#department').val(),
            no_hp : $('#no_hp').val(),
            no_telp : $('#no_telp').val(),
            no_alternatif : $('#no_alternatif').val(),
            hubungan : $('#hubungan').val(),
            rencana_mudik : $('#rencana_mudik').val(),
            tanggal_berangkat : $('#tanggal_berangkat').val(),
            tanggal_kembali : $('#tanggal_kembali').val()
        }

        $.get('{{ url("post/data_komunikasi") }}', data, function(result, status, xhr){
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