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


<div id="main-container" style="overflow-y: scroll; overflow-x:hidden; margin:5px; border:1px solid #d8d8d8; background-color:white;">
    <div class="row" style="height: 80px; padding-top:7px; color:gray-dark; overflow-y: scroll; overflow-x:hidden; text-align: center; display:flex; flex-wrap: wrap;">
        <div style="flex : 1 1 250px; border-bottom:1px solid #d8d8d8;">
            <P class="title-status" id="title_pengiriman_baru">Pengiriman Baru</P>
            <span class="checkbox-custom2"><input type="checkbox" value="PENGIRIMAN BARU" id="check_pengiriman_baru"></span>
            <div class="line-1" id="line-1"></div>
            <P class="hint" id="hint_pengiriman_baru"></P>
        </div>
        <div style="flex : 1 1 250px; border-bottom:1px solid #d8d8d8;">
            <P class="title-status" id="title_berangkat" style="margin-bottom:-2px;">Berangkat</P>
            <span class="checkbox-custom2"><input type="checkbox" value="BERANGKAT" id="check_berangkat"></span>
            <div class="line-2" id="line-2"></div>
            <div class="line-3" id="line-3"></div>
            <P class="hint" id="hint_berangkat"></P>
        </div>
        <div style="flex : 1 1 250px; border-bottom:1px solid #d8d8d8;">
            <P class="title-status" id="title_terkirim" style="margin-bottom:-2px;">Terkirim</P>
            <span class="checkbox-custom2"><input type="checkbox" value="TERKIRIM" id="check_terkirim"></span>
            <div class="line-2" id="line-4"></div>
            <div class="line-3" id="line-5"></div>
            <P class="hint" id="hint_terkirim"></P>
        </div>
        <div style="flex : 1 1 250px; border-bottom:1px solid #d8d8d8;">
            <P class="title-status" id="title_batal" style="margin-bottom:-2px;">Batal</P>
            <span class="checkbox-custom2"><input type="checkbox" value="BATAL" id="check_batal"></span>
            <div class="line-2" id="line-6"></div>
            <P class="hint" id="hint_batal"></P>
        </div>
    </div>

    <div class="row" style="border:solid 1px #d8d8d8; padding:7px 23px 7px 21px; background-color:white;">
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
                        <textarea class="form-control inp rounded-0" id="gps" name="gps" rows="6"></textarea>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- TIMELINE -->
        <div class="col-sm-9" style="background-color: white; border:1px solid lightgray;">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard margin-right-min15"></i>Timeline</p></div>
            </div>

            <div class="container" style="padding:5px 5px 15px 5px; border-bottom:1px dashed gray;">
                <button id="update_btn" type="button" class="btn btn-primary btn-sm"><i class="fa fa-save" style="margin-right:-15px;"></i>Update Surat Jalan</button>
                <button id="batal_btn" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-window-close" style="margin-right:-15px;"></i>Batal</button>
                <button id="hapus_btn" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash" style="margin-right:-15px;"></i>Hapus</button>
            </div>

            <div class="container">
                <section class="gradient-custom-5">
                    <div class="container py-5">
                        <div class="main-timeline-5">
                            <div id="history_sj"></div>
                        </div>
                    </div>
                </section>
            </div>
            
        </div>
    </div>

    <div class="footer-sj">
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

        // Hover Hint
        $("#check_pengiriman_baru").hover(function() {
            $('#check_pengiriman_baru').css('cursor', 'pointer'); 
            $('#hint_pengiriman_baru').text("Pindah ke : Pengiriman Baru").fadeIn();
        }, function() {
            $('#hint_pengiriman_baru').text("").fadeOut();
        });

        $("#check_berangkat").hover(function() {
            $('#check_berangkat').css('cursor', 'pointer'); 
            $('#hint_berangkat').text("Pindah ke : Berangkat").fadeIn();
        }, function() {
            $('#hint_berangkat').text("").fadeOut();
        });

        $("#check_terkirim").hover(function() {
            $('#check_terkirim').css('cursor', 'pointer'); 
            $('#hint_terkirim').text("Pindah ke : Terkirim").fadeIn();
        }, function() {
            $('#hint_terkirim').text("").fadeOut();
        });

        $("#check_batal").hover(function() {
            $('#check_batal').css('cursor', 'pointer'); 
            $('#hint_batal').text("Pindah ke : Batal").fadeIn();
        }, function() {
            $('#hint_batal').text("").fadeOut();
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

        getdetaildata();
        load_timeline('', _token);

        // Get Detail History
        function load_timeline(id="", _token){
            $.ajax({
                url:"{{ url('load_timeline') }}",
                method:"POST",
                cache: false,
                data:{
                    id:id, 
                    nama_surat_jalan : $('#title_nama_surat_jalan').val(),
                    nik: $('#nik').val(),
                    _token:_token},
                
                success:function(data){
                    $('#load_more_button').remove();
                    $('#history_sj').append(data.detail);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        }

        // History Load more button
        $(document).on('click', '#load_more_button', function(){
            var id = $(this).data('id');
            $('#load_more_button').html('<b>Loading...</b>');
            load_timeline(id, _token);
        });

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
                    $('#driver').val(data.NamaKaryawan.toUpperCase());
                    $('#nomor_kendaraan').val(data.kendaraan_id.toUpperCase());
                    $('#nama_project').val(data.project_name);
                    $('#alamat_pengiriman').val(data.alamat_project);
                    $('#nama_penerima').val(data.nama_penerima);
                    data.gps != null? $('#gps').val(data.gps + "\n\n" + data.gps_time) : $('#gps').val('');

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

                    switch(data.status_pengiriman){
                        case 'PENGIRIMAN BARU':
                            $('#check_pengiriman_baru').prop('checked', true);
                            $("#title_berangkat").css("color", "white");
                            $("#title_terkirim").css("color", "white");
                            $("#title_batal").css("color", "white");
                            $("#line-1").css("background-color","#B2E6F5");
                            break;
                        case 'BERANGKAT':
                            $('#check_pengiriman_baru').prop('checked', true);
                            $('#check_berangkat').prop('checked', true);
                            $("#title_terkirim").css("color", "white");
                            $("#title_batal").css("color", "white");
                            $("#line-1").css("background-color","#B2E6F5");
                            $("#line-2").css("background-color","#8DD6F7");
                            break;
                        case 'TERKIRIM':
                            $('#check_pengiriman_baru').prop('checked', true);
                            $('#check_berangkat').prop('checked', true);
                            $('#check_terkirim').prop('checked', true);
                            $("#title_batal").css("color", "white");
                            $("#line-1").css("background-color","#B2E6F5");
                            $("#line-2").css("background-color","#8DD6F7");
                            $("#line-3").css("background-color","#8DD6F7");
                            $("#line-4").css("background-color","#5BC0DE");
                            break;
                        case 'BATAL':
                            $('#check_batal').prop('checked', true);
                            $("#line-1").css("background-color","#B7CEE9");
                            $("#line-2").css("background-color","#B7CEE9");
                            $("#line-3").css("background-color","#B7CEE9");
                            $("#line-4").css("background-color","#B7CEE9");
                            $("#line-5").css("background-color","#B7CEE9");
                            $("#line-6").css("background-color","#B7CEE9");
                            break;
                    }
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        }

        // Update Data
        $('#update_btn').click(function(){
            alert("update");
        });
        
        // Batal
        $('#batal_btn').click(function(){
            var surat_jalan = $('#title_nama_surat_jalan').val();
            var str="Nama Surat Jalan  :  " + surat_jalan;
            Swal.fire({
                title: 'Anda yakin ingin membatalkan data ini ?',
                html: '<center>' + str + '</center>',
                customClass: {
                    popup: 'format-pre'
                },
                icon: 'warning',
                showCancelButton: true
            }).then((result)=>{
                if(result.value){
                    $.ajax({
                        data: {
                            tipe : 'surat_jalan',
                            task : 'batal',
                            surat_jalan : surat_jalan
                        },
                        type: "POST",
                        dataType: 'json',
                        url: "{{ url('crud_update') }}",
                        cache: false,
                        success: function (data) {
                            console.log('Success:', data);
                            Swal.fire({
                                title: 'Success !',
                                text: 'Data berhasil diupdate.',
                                icon: 'info',
                                showConfirmButton:false,
                            })
                            setTimeout(function(){
                                location.reload();
                            },1000);

                            $('#check_pengiriman_baru').prop('checked', false);
                            $('#check_berangkat').prop('checked', false);
                            $('#check_terkirim').prop('checked', false);
                            $('#check_batal').prop('checked', true);
                            $("#line-1").css("background-color","#B7CEE9");
                            $("#line-2").css("background-color","#B7CEE9");
                            $("#line-3").css("background-color","#B7CEE9");
                            $("#line-4").css("background-color","#B7CEE9");
                            $("#line-5").css("background-color","#B7CEE9");
                            $("#line-6").css("background-color","#B7CEE9");
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })
        });
        // Hapus Data
        $('#hapus_btn').click(function(){
            var surat_jalan = $('#title_nama_surat_jalan').val();
            var str="Nama Surat Jalan  :  " + surat_jalan;
            Swal.fire({
                title: 'Anda yakin ingin menghapus data ini ?',
                html: '<center>' + str + '</center>',
                customClass: {
                    popup: 'format-pre'
                },
                icon: 'warning',
                showCancelButton: true
            }).then((result)=>{
                if(result.value){
                    $.ajax({
                        data: {
                            tipe : 'surat_jalan',
                            surat_jalan : surat_jalan
                        },
                        type: "POST",
                        dataType: 'json',
                        url: "{{ url('crud_delete') }}",
                        cache: false,
                        success: function (data) {
                            console.log('Success:', data);
                            Swal.fire({
                                title: 'Deleted !',
                                text: 'Data berhasil dihapus.',
                                icon: 'success',
                                showConfirmButton:false,
                            })
                            setTimeout(function(){
                                window.location.href='surat_jalan' + '-' + 
                                [
                                    'surat_jalan',
                                    $('#nik').val(),
                                ];
                            },1000);
                        },
                        error: function (data) {
                            console.log('Error:', data);
                        }
                    });
                }
            })
        });

       
    });     
</script>

@endsection