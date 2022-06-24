@extends('master')
@section('judul_halaman',  $data['judul'])
@section('content')

<input type="text" id="nik" value="{{ $data['nik'] }}" class="form-control-sm" hidden readonly>  
<input type="text" id="nama_surat_jalan" value="{{ $data['nama_surat_jalan'] }}" class="form-control-sm" hidden readonly>   

<nav>
    <ol class="breadcrumb" style="margin-top:-10px; margin-bottom:10px;">
        <li class="breadcrumb-item"><a href="surat_jalan-surat_jalan,<?php echo $data['nik'] ?>"><i class="fa fa-caret-left" style="margin-right: -15px;"></i>Back</a></li>
        <li class="breadcrumb-item" style="color: grey;">Detail Surat Jalan</li>
    </ol>      
</nav>  


<div id="main-container" style="overflow-y: scroll; overflow-x:hidden; margin:5px; border:1px solid #d8d8d8;">
    <div style="height: 80px; padding:5px; padding:8px; text-align:right">
        <div class="row">
            <div class="col" style="background-color: green;">
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
                        <input type="text" id="" name="" class="inp">
                        
                        <label class="inp-title">Tanggal Surat Jalan</label>
                        <input  type="date" id="" name="" class="inp">

                        <label class="inp-title">Driver</label>
                        <input type="text" id="" name="" class="inp">

                        <label class="inp-title">Nomor Kendaraan</label>
                        <input type="text" id="" name="" class="inp">

                        <label class="inp-title">Nama Project</label>
                        <input type="text" id="" name="" class="inp">

                        <label class="inp-title">Alamat Pengiriman</label>
                        <input type="text-area" id="" name="" class="inp">

                        <label class="inp-title">Tanda Tangan Penerima</label>
                        <input type="text" id="" name="" class="inp">

                        <label class="inp-title">Tanda Tangan Pengirim</label>
                        <input type="text" id="" name="" class="inp">

                        <label class="inp-title">Foto Barang + Penerima</label>
                        <input type="text" id="" name="" class="inp">

                        <label class="inp-title">Foto Surat Jalan</label>
                        <input type="text" id="" name="" class="inp">

                        <label class="inp-title">GPS</label>
                        <input type="text" id="" name="" class="inp">
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

       
    });     
</script>

@endsection