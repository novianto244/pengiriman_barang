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
                <td><input id="search_tanggal" autocomplete="off" class="form-control form-control-sm datepicker" placeholder="yyyy-mm-dd"></td>
                <td style="text-align:center;"><select id="search_driver" name="search_driver" class="form-select" style="width:250px; font-size:12px;" autocomplete="off"/></td>
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
        <div id="div_pengiriman_baru" class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage1.png" alt="stage1" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard margin-right-min15"></i>PENGIRIMAN BARU</p></div>
                <div class="col-sm-4 text-right"><p id="total_pengiriman_baru" class="badge-total"></p></div>
            </div>
         
            <div class="panel-body" >
                {{ csrf_field() }}
                <div id="post_data_baru" class="noDrop"></div>
            </div>
        </div>
        <div id="div_berangkat" class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage2.png" alt="stage2" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-shipping-fast margin-right-min15"></i>BERANGKAT</p></div>
                <div class="col-sm-4 text-right"><p id="total_berangkat" class="badge-total"></p></div>
            </div>
          
            <div class="panel-body">
                {{ csrf_field() }}
                <div id="post_data_berangkat" class="noDrop"></div>
            </div>
        </div>
        <div id="div_terkirim" class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage3.png" alt="stage3" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard-check margin-right-min15"></i>TERKIRIM</p></div>
                <div class="col-sm-4 text-right"><p id="total_terkirim" class="badge-total"></p></div>
               
            </div>

            <div class="panel-body">
                {{ csrf_field() }}
                <div id="post_data_terkirim" class="noDrop"></div>
            </div>
        </div>
        <div id="div_batal" class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage4.png" alt="stage4" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8">  <p class="capital-title-white"><i class="fa fa-times-circle margin-right-min15"></i>BATAL</p></div>
                <div class="col-sm-4 text-right"><p id="total_batal" class="badge-total"></p></div>
            </div>

            <div class="panel-body">
                {{ csrf_field() }}
                <div id="post_data_batal" class="noDrop"></div>
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

    function dragging(event) {
        // document.getElementById("demo").innerHTML = "The p element is being dragged";
    }

    function allowDrop(event) {
        event.preventDefault();
    }

    function drop(event, target) {
        event.preventDefault();

        // var target = event.target.id;
        // var _target = $("#" + event.target.id);

        // if ($(target).hasClass("noDrop")) {
        //     alert('ga bisa drop');
        // }else{
        //     alert('bisa drop');
        // }

        // belom selesai

        var data = event.dataTransfer.getData("Text");
        var target = event.target.id;

        event.target.appendChild(document.getElementById(data));

        if(target=="div_pengiriman_baru" || target=="div_berangkat" || target=="div_terkirim" || target=="div_batal" ){
            move_status(data, target);
        }else{
            alert("salah bung !");
            $('#search_btn').trigger("click");
        }
    }

    function move_status(nama_surat_jalan, target){
        $.ajax({
            url:"{{ url('move_status_sj') }}",
            method:"POST",
            cache: false,
            data:{
                nik: $('#nik').val(),
                nama_surat_jalan : nama_surat_jalan,
                target : target    
            },
            success:function(data){
                $('#search_btn').trigger("click");
                console.log('Success:', data);
            },
            error: function (data) {
                console.log('Error:', data);
            }
        })
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

        $('#search_driver').select2({
			// allowClear: true
		});

        // Get data Driver 
		$.ajax({
            type: 'POST',
            url: "{{ url('getdriver') }}",
            dataType: 'json',
            cache: false, 
            success: function(response){
                var len = 0;
                if(response != null){len = response.length;}
                if(len > 0){
                    for(var i=0; i<len; i++){
                        var NIK = response[i].NIK;
                        var NamaKaryawan = response[i].NamaKaryawan;
                        
                        // Search By Driver
                        var option = "<option value='"+NIK+"'>"+ NIK + " - " + NamaKaryawan + "</option>"; 
                        $("#search_driver").append(option); 
                    }
                }
            }
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
                    id:id, 
                    nik: $('#nik').val(),
                    parameter : [
                        'PENGIRIMAN BARU',
                        $('#search_no_form').val(),
                        $('#search_project').val(),
                        $('#search_driver').val(),
                        $('#search_tanggal').val()
                    ],
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
                    id:id, 
                    nik: $('#nik').val(),
                    parameter : [
                        'BERANGKAT',
                        $('#search_no_form').val(),
                        $('#search_project').val(),
                        $('#search_driver').val(),
                        $('#search_tanggal').val()
                    ],
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
                    id:id, 
                    nik: $('#nik').val(),
                    parameter : [
                        'TERKIRIM',
                        $('#search_no_form').val(),
                        $('#search_project').val(),
                        $('#search_driver').val(),
                        $('#search_tanggal').val()
                    ],
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
                    id:id, 
                    nik: $('#nik').val(),
                    parameter : [
                        'BATAL',
                        $('#search_no_form').val(),
                        $('#search_project').val(),
                        $('#search_driver').val(),
                        $('#search_tanggal').val()
                    ],
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
                data:{
                    parameter : [
                        $('#search_no_form').val(),
                        $('#search_project').val(),
                        $('#search_driver').val(),
                        $('#search_tanggal').val()
                    ],
                    _token:_token},
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

        // Clear All Data
        function clear_all_data(){
            $('#post_data_baru').empty();
            $('#post_data_berangkat').empty();
            $('#post_data_terkirim').empty();
            $('#post_data_batal').empty();
        }

        // Search 
        $('#search_btn').click(function(){
            clear_all_data();
            load_data_total();
            load_data_pengiriman_baru('', _token);
            load_data_berangkat('', _token);
            load_data_terkirim('', _token);
            load_data_batal('', _token);
            load_data_total();
        });

        // Reset
        $('#reset_btn').click(function(){
            location.reload();
        });

        function trigger_save_by_enter(){
            var keycode = (event.keyCode ? event.keyCode : event.which);
            if(keycode == '13'){
               $('#search_btn').trigger("click");
               load_data_total();
            }
        }
        
        // Trigger search by Enter Button
        $("#search_no_form").keypress(function(event){
            trigger_save_by_enter();
        });

        $("#search_project").keypress(function(event){
            trigger_save_by_enter();
        });

        $('#search_driver').change(function(){
            $('#search_btn').trigger("click");
            load_data_total();
        });

        $('#search_tanggal').datepicker()
            .on("input change", function (e) {
                $('#search_btn').trigger("click");
                load_data_total();
        });

    });     
</script>

@endsection