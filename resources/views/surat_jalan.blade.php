@extends('master')
@section('judul_halaman',  $data['judul'])
@section('content')

<input type="text" id="nik" value="{{ $data['nik'] }}" class="form-control-sm" hidden readonly>   

<div id="main-container" style="background-color: green; overflow-y: scroll; padding:10px;">
    <div class="row" style="height: 750px;">
        <div class="col-md-3" style="background-color: blue;">  
            PENGIRIMAN BARU
        </div>
        <div class="col-md-3" style="background-color: grey;">
            BERANGKAT
        </div>
        <div class="col-md-3" style="background-color: teal;">
            TERKIRIM
        </div>
        <div class="col-md-3" style="background-color: pink;">
            BATAL
        </div>
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
                $('#main-container').height(520);
                break;
        }
        console.log(window.screen.height);

       
    });     
</script>

@endsection