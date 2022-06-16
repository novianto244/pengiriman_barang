@extends('master')
@section('judul_halaman',  $data['judul'])
@section('content')

<input type="text" id="nik" value="{{ $data['nik'] }}" class="form-control-sm" hidden readonly>   

<div style=" height:500px; position: relative;"> 
    <div style=" margin: 0; text-align:center; position: absolute; top: 50%; left: 50%; -ms-transform: translate(-50%, -50%); transform: translate(-50%, -50%);">
        <img style="margin-bottom: 25px;" src="public/logoJK.jpg">
        <h6>PT Jaya Kencana</h6>
        <p style="font-size: 12px; color:grey;">JL. SALEMBA RAYA NO.61  JAKARTA PUSAT - DKI JAKARTA <br>
            INDONESIA - 10440<br>
            Phone : (021) 390 8501<br>
            NPWP  : 01.307.296.2-073.000
        </p>
    </div>
 
</div>
           
<script type="text/javascript">
    $(function () {     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

       
    });     
</script>

@endsection