@extends('master')
@section('judul_halaman',  $data['judul'])
@section('content')

<input type="text" id="nik" value="{{ $data['nik'] }}" class="form-control-sm" hidden readonly>   

<div id="main-container" style="overflow-y: scroll; overflow-x:hidden; margin:5px; border:1px solid #d8d8d8;">
    <div style="height: 80px; padding:5px; padding:8px; text-align:right">
        <table class="table table-sm table-borderless">
            <tr>
                <td colspan="6" style="padding: 0px 2px 5px 0px;">
                    <button type="button" id="btnreset" class="btn btn-outline-primary"><i class="fa fa-plus margin-right-min15"></i> Tambah Surat Jalan</button>
                    <button type="button" id="btnreset" class="btn btn-outline-primary"><i class="fa fa-download margin-right-min15"></i> Download</button>
                </td>
            </tr>
            <tr>
                <td><input id="search_masa" type="text" class="form-control form-control-sm" placeholder="Search by No Surat Jalan" autocomplete="off"></td>
                <td><input id="search_masa" type="text" class="form-control form-control-sm" placeholder="Search by Project" autocomplete="off"></td>
                <td><input id="search_masa" type="text" class="form-control form-control-sm" placeholder="Search by Driver" autocomplete="off"></td>
                <td><input autocomplete="off" class="form-control form-control-sm datepicker" placeholder="yyyy-mm-dd"></td>
                <td> 
                    <div class="d-grid gap-2">
                        <button class="btn btn-primary" type="button"><i class="fa fa-search margin-right-min15"></i>Search</button>
                        <button class="btn btn-info" type="button"><i class="fa fa-redo margin-right-min15"></i> Reset</button>
                    </div>
                </td>
            </tr>
        </table>
    </div>

    <div class="row" style="height:1000px; border:solid 1px #d8d8d8; padding:7px 23px 7px 21px; background-color:white;">
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage1.png" alt="stage1" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard margin-right-min15"></i>PENGIRIMAN BARU</p></div>
                <div class="col-sm-4 text-right"><p class="badge-total">120000</p></div>
            </div>
            <div class="box-content">
                <p ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="dragtarget1">Isi 1</p>
            </div>
        </div>
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage2.png" alt="stage2" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-car-side margin-right-min15"></i>BERANGKAT</p></div>
                <div class="col-sm-4 text-right"><p class="badge-total">1200</p></div>
            </div>
            <div class="box-content">
                <p ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="dragtarget2">Isi 2</p>
            </div>
        </div>
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage3.png" alt="stage3" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8"> <p class="capital-title-white"><i class="fa fa-clipboard-check margin-right-min15"></i>TERKIRIM</p></div>
                <div class="col-sm-4 text-right"><p class="badge-total">12000</p></div>
               
            </div>
            <div class="box-content">
                <p ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="dragtarget3">Isi 3</p>
            </div>
        </div>
        <div class="col-md-3 bordered-box" ondrop="drop(event)" ondragover="allowDrop(event)">  
            <img src="public/img/stage4.png" alt="stage4" class="responsive">
            <div class="row border-bottom dark-background" style="padding-top:15px;">
                <div class="col-sm-8">  <p class="capital-title-white"><i class="fa fa-times-circle margin-right-min15"></i>BATAL</p></div>
                <div class="col-sm-4 text-right"><p class="badge-total">120</p></div>
            </div>
            <div class="box-content">
                <p ondragstart="dragStart(event)" ondrag="dragging(event)" draggable="true" id="dragtarget4">Isi 4</p>
            </div>
        </div>
    </div>

    <div style="height: 35px; padding:5px; text-align:center; color:gray; font-size:13px;">
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

    });     
</script>

@endsection