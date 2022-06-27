@extends('master')
@section('judul_halaman',  $data['judul'])
@section('content')

<input type="text" id="nik" value="{{ $data['nik'] }}" class="form-control-sm" hidden readonly>   

<div id="main-container" style="overflow-y: scroll; overflow-x:hidden; margin:5px; border:1px solid #d8d8d8; background-color:white;">
    <div style="height: 80px; padding:5px; padding:8px; text-align:right">
        <table class="table table-sm table-borderless">
            <tr>
                <td colspan="6" style="padding: 0px 2px 5px 0px;">
                    <button type="button" id="btnreset" class="btn btn-outline-primary"><i class="fa fa-plus margin-right-min15"></i> Tambah Surat Jalan</button>
                    <button type="button" id="btnreset" class="btn btn-outline-primary"><i class="fa fa-download margin-right-min15"></i> Download</button>
                </td>
            </tr>
            <tr>
                <td><input id="search_no_form" type="text" class="form-control form-control-sm" placeholder="Search by Nama Surat Jalan" autocomplete="off"></td>
                <td><input id="search_project" type="text" class="form-control form-control-sm" placeholder="Search by Project" autocomplete="off"></td>
                <td><input id="search_driver" type="text" class="form-control form-control-sm" placeholder="Search by Driver" autocomplete="off"></td>
                <td><input id="search_tanggal" autocomplete="off" class="form-control form-control-sm datepicker" placeholder="yyyy-mm-dd"></td>
                <td> 
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" id="search_btn" type="button"><i class="fa fa-search margin-right-min15"></i>Search</button>
                        <button class="btn btn-info" id="reset_btn" type="button"><i class="fa fa-redo margin-right-min15"></i> Reset</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="row" style="border:solid 1px #d8d8d8; padding:7px 23px 7px 21px; background-color:white;">
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage1.png" alt="stage1" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard margin-right-min15"></i>PENGIRIMAN BARU</p></div>
                <div class="col-sm-4 text-right"><p id="total_pengiriman_baru" class="badge-total"></p></div>
            </div>
         
            <div class="panel-body">
                {{ csrf_field() }}
                <div id="post_data_baru"></div>
            </div>


        </div>
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage2.png" alt="stage2" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-car-side margin-right-min15"></i>BERANGKAT</p></div>
                <div class="col-sm-4 text-right"><p id="total_berangkat" class="badge-total"></p></div>
            </div>
          
            <div class="panel-body">
                {{ csrf_field() }}
                <div id="post_data_berangkat"></div>
            </div>
        </div>
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage3.png" alt="stage3" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard-check margin-right-min15"></i>TERKIRIM</p></div>
                <div class="col-sm-4 text-right"><p id="total_terkirim" class="badge-total"></p></div>
               
            </div>

            <div class="panel-body">
                {{ csrf_field() }}
                <div id="post_data_terkirim"></div>
            </div>
        </div>
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage4.png" alt="stage4" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8">  <p class="capital-title-white"><i class="fa fa-times-circle margin-right-min15"></i>BATAL</p></div>
                <div class="col-sm-4 text-right"><p id="total_batal" class="badge-total"></p></div>
            </div>

            <div class="panel-body">
                {{ csrf_field() }}
                <div id="post_data_batal"></div>
            </div>
        </div>
    </div>

    <div class="footer-sj">
        2022 © Jayakencana.com. All rights reserved.
    </div>

</div>


<script type="text/javascript">
    // Dragabel function
    function dragStart(event) {
        event.dataTransfer.setData("Text", event.target.id);
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event) {
        event.preventDefault();
        var data = event.dataTransfer.getData("Text");
        event.target.appendChild(document.getElementById(data));
    }

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
                $('#main-container').height(520);
                break;
        }
        console.log(window.screen.height);

        // Datepicker format
        $(".datepicker").datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
            todayHighlight: true,
            language: "id",
            weekStart: 0,
        });


        /* ::::::::::::: GET DATA SURAT JALAN :::::::::::::::::::: */

        var _token = $('input[name="_token"]').val();

        load_data_pengiriman_baru('', _token);
        load_data_berangkat('', _token);
        load_data_terkirim('', _token);
        load_data_batal('', _token);
        load_data_total();

        // Pengiriman Baru
        function load_data_pengiriman_baru(id="", _token){
            $.ajax({
                url:"{{ url('load_data_pengiriman_baru') }}",
                method:"POST",
                cache: false,
                data:{
                    tipe: 'pengiriman_baru',
                    id:id, 
                    nik: $('#nik').val(),
                    _token:_token},
                
                success:function(data){
                    $('#load_more_button_pengiriman_baru').remove();
                    $('#post_data_baru').append(data.surat_jalan);
                },
                error: function (data) {
                console.log('Error:', data);
                }
            })
        }

        $(document).on('click', '#load_more_button_pengiriman_baru', function(){
            var id = $(this).data('id');
            $('#load_more_button_pengiriman_baru').html('<b>Loading...</b>');
            load_data_pengiriman_baru(id, _token);
        });

        // Berangkat
        function load_data_berangkat(id="", _token){
            $.ajax({
                url:"{{ url('load_data_berangkat') }}",
                method:"POST",
                cache: false,
                data:{
                    tipe: 'berangkat',
                    id:id, 
                    nik: $('#nik').val(),
                    _token:_token},
                
                success:function(data){
                    $('#load_more_button_berangkat').remove();
                    $('#post_data_berangkat').append(data.surat_jalan);
                },
                error: function (data) {
                console.log('Error:', data);
                }
            })
        }

        $(document).on('click', '#load_more_button_berangkat', function(){
            var id = $(this).data('id');
            $('#load_more_button_berangkat').html('<b>Loading...</b>');
            load_data_berangkat(id, _token);
        });

        // Terkirim
        function load_data_terkirim(id="", _token){
            $.ajax({
                url:"{{ url('load_data_terkirim') }}",
                method:"POST",
                cache: false,
                data:{
                    tipe: 'terkirim',
                    id:id, 
                    nik: $('#nik').val(),
                    _token:_token},
                
                success:function(data){
                    $('#load_more_button_terkirim').remove();
                    $('#post_data_terkirim').append(data.surat_jalan);
                },
                error: function (data) {
                console.log('Error:', data);
                }
            })
        }

        $(document).on('click', '#load_more_button_terkirim', function(){
            var id = $(this).data('id');
            $('#load_more_button_terkirim').html('<b>Loading...</b>');
            load_data_terkirim(id, _token);
        });

        // Batal
        function load_data_batal(id="", _token){
            $.ajax({
                url:"{{ url('load_data_batal') }}",
                method:"POST",
                cache: false,
                data:{
                    tipe: 'batal',
                    id:id, 
                    nik: $('#nik').val(),
                    _token:_token},
                
                success:function(data){
                    $('#load_more_button_batal').remove();
                    $('#post_data_batal').append(data.surat_jalan);
                },
                error: function (data) {
                console.log('Error:', data);
                }
            })
        }

        $(document).on('click', '#load_more_button_batal', function(){
            var id = $(this).data('id');
            $('#load_more_button_batal').html('<b>Loading...</b>');
            load_data_batal(id, _token);
        });

        // Total
        function load_data_total(){
            $.ajax({
                url:"{{ url('load_data_total') }}",
                method:"POST",
                cache: false,
                
                success:function(data){                   
                    $('#total_pengiriman_baru').text(data.pengiriman_baru);
                    $('#total_berangkat').text(data.berangkat);
                    $('#total_terkirim').text(data.terkirim);
                    $('#total_batal').text(data.batal);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            })
        }


     
       






















        // Search 
        $('#search_btn').click(function(){
          alert("belom selesai");
        });

        // Reset
            $('#reset_btn').click(function(){
            location.reload();
        });
        



    });     
</script>

@endsection