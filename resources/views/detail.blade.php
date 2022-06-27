@extends('master')
@section('judul_halaman',  $data['judul'])
@section('content')

<input type="text" id="nik" value="{{ $data['nik'] }}" class="form-control-sm" hidden readonly>  
<input type="text" id="title_nama_surat_jalan" value="{{ $data['nama_surat_jalan'] }}" class="form-control-sm" hidden readonly>   

<nav>
    <ol class="breadcrumb" style="margin-top:-10px; margin-bottom:10px;">
        <li class="breadcrumb-item"><a href="surat_jalan-surat_jalan,<?php echo $data['nik'] ?>"><i class="fa fa-caret-left" style="margin-right: -15px;"></i>Back</a></li>
        <li class="breadcrumb-item" style="color: grey;">Detail Surat Jalan</li>
    </ol>      
</nav>  


<div id="main-container" style="overflow-y: scroll; overflow-x:hidden; margin:5px; border:1px solid #d8d8d8;">
    <div style="height: 80px; padding:5px; padding:8px; text-align:right">
        <div class="row">
            <div class="col">
                    <p id="title_pengiriman_baru">Pengiriman Baru</p>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
            </div>
            <div class="col" style="text-align: center;">
                <div class="form-check">
                    <p id="title_pengiriman_baru">Pengiriman Baru</p>
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                </div>
            </div>
            <div class="col">col</div>
            <div class="col">col</div>
        </div>
    </div>

    <div class="row" style="border:solid 1px #d8d8d8; padding:7px 23px 7px 21px; margin-bottom:15px; background-color:white;">
        <!-- Detail Surat Jalan -->
        <div class="col-sm-3" style="background-color: white; border:1px solid lightgray;">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard margin-right-min15"></i>Detail Surat Jalan</p></div>
            </div>
            <div class="panel-body">
                <div class="form-row">
                    <div class="form-group col-md-12" style="margin-top: 25px;">
                        <label class="inp-title">Nama Surat Jalan</label>
                        <input type="text" id="nama_surat_jalan" name="nama_surat_jalan" class="inp">
                        
                        <label class="inp-title">Tanggal Surat Jalan</label>
                        <input id="tanggal_surat_jalan" name="tanggal_surat_jalan" class="form-control form-control-sm datepicker" placeholder="yyyy-mm-dd" style="margin-bottom: 25px;"'>

                        <label class="inp-title">Driver</label>
                        <input type="text" id="driver" name="driver" class="inp">

                        <label class="inp-title">Nomor Kendaraan</label>
                        <input type="text" id="nomor_kendaraan" name="nomor_kendaraan" class="inp">

                        <label class="inp-title">Nama Project</label>
                        <input type="text" id="nama_project" name="nama_project" class="inp">

                        <label class="inp-title">Alamat Pengiriman</label>
                        <textarea class="form-control rounded-0 inp" id="alamat_pengiriman" name="alamat_pengiriman" rows="3"></textarea>

                        <label class="inp-title">Nama Penerima</label>
                        <input type="text" id="nama_penerima" name="nama_penerima" class="inp">

                        <label class="inp-title">Tanda Tangan Penerima</label>
                        <div id="div_ttd_penerima"></div>

                        <label class="inp-title">Tanda Tangan Pengirim</label>
                        <div id="div_ttd_pengirim"></div>

                        <label class="inp-title">Foto Barang + Penerima</label>
                        <div id="div_barang_penerima"></div>

                        <label class="inp-title">Foto Barang 2</label>
                        <div id="div_barang2"></div>

                        <label class="inp-title">Foto Surat Jalan</label>
                        <div id="div_surat_jalan"></div>

                        <label class="inp-title">GPS</label>
                        <textarea class="form-control rounded-0" id="gps" name="gps" rows="6"></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- TIMELINE -->
        <div class="col-sm-9" style="background-color: white; border:1px solid lightgray;">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard margin-right-min15"></i>Timeline</p></div>
            </div>

            <div class="container" id="history_sj"></div>
        </div>
    </div>

    <div style="height: 35px; padding:5px; text-align:center; color:gray; font-size:13px;">
        2022 © Jayakencana.com. All rights reserved.
    </div>

</div>

           
<script type="text/javascript">
    $(function () {     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Datepicker format
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            language: "id",
            weekStart: 0,
        });

        // Set Container Height
        switch(window.screen.height){
            case 864:
                $('#main-container').height(600);
                break; 
            default:
                $('#main-container').height(485);
                break;
        }
        console.log(window.screen.height);

        var _token = $('input[name="_token"]').val();

        load_timeline('', _token);
        getdetaildata();

        // Get Detail History
        function load_timeline(id="", _token){
            $.ajax({
                url:"{{ url('load_timeline') }}",
                method:"POST",
                cache: false,
                data:{
                    id:id, 
                    nama_surat_jalan : $('#nama_surat_jalan').val(),
                    nik: $('#nik').val(),
                    _token:_token},
                
                success:function(data){
                    // $('#load_more_button_pengiriman_baru').remove();
                    $('#history_sj').append(data.detail);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        }

        // Get Detail Data
        function getdetaildata(){
            $.ajax({
                url:"{{ url('getdatadetail') }}",
                method:"POST",
                cache: false,
                data:{ 
                    nama_surat_jalan : $('#title_nama_surat_jalan').val(),
                    nik: $('#nik').val()
                },
                success:function(data){
                    console.log(data);
                    $('#nama_surat_jalan').val(data.nama_surat_jalan);
                    $('#tanggal_surat_jalan').val(data.tanggal_surat_jalan).datepicker("update");
                    $('#driver').val(data.NamaKaryawan);
                    $('#nomor_kendaraan').val(data.kendaraan_id);
                    $('#nama_project').val(data.project_name);
                    $('#alamat_pengiriman').val(data.alamat_project);
                    $('#nama_penerima').val(data.nama_penerima);
                    $('#gps').val(data.gps + "\n\n" + data.gps_time);

                    if(data.tanda_tangan_penerima != null){
                        $('#div_ttd_penerima').append(
                            "<img class='inp' id='tanda_tangan_penerima' style='max-height:100%; max-width:100%' src='gambar/"+ data.tanda_tangan_penerima + "'" + "title='Click to enlarge image !' alt=''>"
                        );
                    }else{
                        // Belum selesai
                        $('#div_ttd_penerima').append(
                            "<input type='text' id='tanda_tangan_penerima' name='tanda_tangan_penerima' class='inp'>"
                        );
                    }

                    if(data.tanda_tangan_pengirim != null){
                        $('#div_ttd_pengirim').append(
                            "<img class='inp' id='tanda_tangan_pengirim' style='max-height:100%; max-width:100%' src='gambar/"+ data.tanda_tangan_pengirim + "'" + "title='Click to enlarge image !' alt=''>"
                        );
                    }else{
                        // Belum selesai
                        $('#div_ttd_pengirim').append(
                            "<input type='text' id='tanda_tangan_pengirim' name='tanda_tangan_pengirim' class='inp'>"
                        );
                    }

                    if(data.foto_barang_penerima != null){
                        $('#div_barang_penerima').append(
                            "<img class='inp' id='foto_barang_penerima' style='max-height:100%; max-width:100%' src='gambar/"+ data.foto_barang_penerima + "'" + "title='Click to enlarge image !' alt=''>"
                        );
                    }else{
                        // Belum selesai
                        $('#div_barang_penerima').append(
                            "<input type='text' id='foto_barang_penerima' name='foto_barang_penerima' class='inp'>"
                        );
                    }

                    if(data.foto_surat_jalan != null){
                        $('#div_surat_jalan').append(
                            "<img class='inp' id='foto_surat_jalan' style='max-height:100%; max-width:100%' src='gambar/"+ data.foto_surat_jalan + "'" + "title='Click to enlarge image !' alt=''>"
                        );
                    }else{
                        // Belum selesai
                        $('#div_surat_jalan').append(
                            "<input type='text' id='foto_surat_jalan' name='foto_surat_jalan' class='inp'>"
                        );
                    }

                    if(data.foto_barang2 != null){
                        $('#div_barang2').append(
                            "<img class='inp' id='foto_barang2' style='max-height:100%; max-width:100%' src='gambar/"+ data.foto_barang2 + "'" + "title='Click to enlarge image !' alt=''>"
                        );
                    }else{
                        // Belum selesai
                        $('#div_barang2').append(
                            "<input type='text' id='foto_barang2' name='foto_barang2' class='inp'>"
                        );
                    }

                   

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        }

       
    });     
</script>

@endsection