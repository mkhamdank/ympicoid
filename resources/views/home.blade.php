@extends('layouts.master')
@section('content')
<style type="text/css">
   
</style>
<section class="mini" id="dashboard" style="padding-bottom:0">
    <div class="mini-content">
        <div class="container">
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="info">
                        <p style="margin-bottom:10px"></p>
                        <p style="margin-bottom:0">Selamat Datang {{Auth::user()->name}}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('laporan_kesehatan') }}"  class="mini-box" style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/laporan_kesehatan.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Laporan <br>Kesehatan</strong>
                        <!-- <span>Laporkan Kondisi Harian Kesehatan Anda Setiap Hari</span> -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('survey_covid') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/covid.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Survey <br>Covid-19</strong>
                        <!-- <span>Survey Penilaian Resiko Covid Diisi Setiap Akhir Libur</span> -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('vaksin') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/vaksin.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Vaksinasi <br>Covid-19</strong>
                        <!-- <span>Daftar dan Update Data Vaksin Anda pada menu ini</span> -->
                    </a>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('data_komunikasi') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/communication.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Data <br>Komunikasi</strong>
                        <span>Media untuk mengumpulkan ketika terjadi suatu peristiwa emergency</span>
                    </a>
                </div> -->
                <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('pkb') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/pkb.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Pernyataan <br>PKB</strong>
                        <!-- <span>Selalu Pahami Isi Buku PKB dan Laporkan disini</span> -->
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('kode_etik') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/kode_etik.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Kode Etik <br>Kepatuhan</strong>
                        <!-- <span>Post Test Mengenai Pemahaman COC (Code Of Conduct)</span> -->
                    </a>
                </div>
                <!-- <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('index/survey_stocktaking') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/stocktaking.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Survey <br>Stocktaking</strong> -->
                        <!-- <span>Seberapa Mengerti Anda Mengenai Stocktaking di YMPI</span> -->
                    <!-- </a>
                </div> -->
               <!--  <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('training_filosofi') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/filosofi_n.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Training <br>Filosofi Yamaha</strong>
                    </a>
                </div> -->
               <!--  <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('emergency') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/emergency1.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Kuisioner <br>Emergency</strong>
                        <span>Media untuk mengumpulkan ketika terjadi suatu peristiwa emergency</span>
                    </a>
                </div> -->
                <!-- <div class="col-lg-3 col-md-3 col-sm-4 col-4" style="padding-left: 5px;padding-right: 6px;">
                    <a href="{{ url('mcu') }}"  class="mini-box"  style="margin-bottom:20px">
                        <i><img src="{{ asset('images/dashboard/mcu.png')}}" alt="" height="50"></i>
                        <strong style="font-size:12px">Hasil <br>MCU</strong>
                        <span>Media untuk mengumpulkan ketika terjadi suatu peristiwa emergency</span>
                    </a>
                </div> -->
            </div>
        </div>
    </div>
</section>

    <!-- <section class="section" id="testimonials" style="padding-top: 20px;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Informasi Vaksin</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Pastikan Data Vaksin Sudah Terupdate Pada Menu "Vaksinasi Covid-19"</p>
                        <p><b>Anda Terdeteksi Belum Vaksin Booster, Untuk itu saat mudik</b></p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <p>Upload Lampiran Rapid / PCR</p>
                            <div class="team-info">
                                <input type="file" id="file_berangkat" name="file_berangkat">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="team-item">
                        <div class="team-content">
                            <p>Upload Lampiran Rapid / PCR</p>
                            <div class="team-info">
                                <input type="file" id="file_kembali" name="file_kembali">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

<!-- <section class="section colored" id="laporan-kesehatan">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Laporan Kesehatan</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Maecenas pellentesque ante faucibus lectus vulputate sollicitudin. Cras feugiat hendrerit semper.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Keep in touch</h5>
                    <div class="contact-text">
                        <p>110-220 Quisque diam odio, maximus ac consectetur eu, 10260
                        <br>auctor non lorem</p>
                        <p>You are NOT allowed to re-distribute Softy Pinko template on any template collection websites. Thank you.</p>
                    </div>
                </div>
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="get">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail Address" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

@stop
    