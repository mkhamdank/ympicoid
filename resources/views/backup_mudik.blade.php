<!-- HOME -->

@if(count($mudik) > 0)
                @if($mudik->rencana_mudik != null)
                @if($mudik->departure == null || $mudik->arrived == null)
                    @if(count($vaksin) > 0)
                            @if($vaksin->vaksin_3 == null && $vaksin->vaksin_2 != null && $vaksin->vaksin_1 != null)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left: 5px;margin-right: 6px;background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="padding-right: 8px;">Anda terdeteksi mudik dan belum melaksanakan Vaksin 3. Silahkan lampirkan hasil test Rapid Antigen saat akan berangkat dan kembali. Tekan tombol di sebelah kanan untuk upload data.</td>
                                            <td><a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('mudik/rapid')}}">Rapid</a></td>
                                        </tr>
                                    </table>
                                </div>
                            @elseif($vaksin->vaksin_3 == null && $vaksin->vaksin_2 == null && $vaksin->vaksin_1 != null)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left: 5px;margin-right: 6px;background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="padding-right: 8px;">Anda terdeteksi mudik dan belum melaksanakan Vaksin 2 & Vaksin 3. Silahkan lampirkan hasil test PCR saat akan berangkat dan kembali. Tekan tombol di sebelah kanan untuk upload data.</td>
                                            <td><a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('mudik/pcr')}}">PCR</a></td>
                                        </tr>
                                    </table>
                                </div>
                             @elseif($vaksin->vaksin_3 == null && $vaksin->vaksin_2 == null && $vaksin->vaksin_1 == null)
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left: 5px;margin-right: 6px;background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td style="padding-right: 8px;">Anda terdeteksi mudik dan belum melaksanakan Vaksin. Silahkan lampirkan hasil test PCR saat akan berangkat dan kembali. Tekan tombol di sebelah kanan untuk upload data.</td>
                                            <td><a style="text-decoration: none;cursor:pointer;background-color:white;color:black;border: 1px solid black;padding: 10px;border-radius: 10px;" href="{{url('mudik/pcr')}}">PCR</a></td>
                                        </tr>
                                    </table>
                                </div>
                            @else
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left: 5px;margin-right: 6px;background-color: #57ff3d;color: black;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
                                    <table style="width: 100%">
                                        <tr>
                                            <td rowspan="2" style="padding-right: 8px;">Anda sudah melaksanakan Vaksin 3 (Booster). Tetap terapkan protokol kesehatan dan lindungi keluarga Anda.</td>
                                        </tr>
                                    </table>
                                </div>
                            @endif
                    @else
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="margin-left: 5px;margin-right: 6px;background-color: #ff4f4f;color: white;text-align: justify;font-size: 11px;padding-top: 10px;padding-bottom:10px;margin-bottom: 10px;border-radius: 10px;">
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












<!-- DATA KOMUNIKASI -->
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