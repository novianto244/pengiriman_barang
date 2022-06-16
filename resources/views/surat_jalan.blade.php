@extends('master')
@section('judul_halaman',  $data['judul'])
@section('content')

<input type="text" id="nik" value="{{ $data['nik'] }}" class="form-control-sm" hidden readonly>   


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