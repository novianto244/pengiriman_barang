<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="assets/font-awesome/css/all.css" rel="stylesheet">
</head>
<body>
    <div class="sidenav" style="font-size:13px;"> 
        <div style="font-size:12px; text-shadow:3px 3px 3px #3b589842; color:gray; font-style:italic; margin-top:-15px; margin-bottom:20px; margin-left:10px;">
            <p id="nama_user" style="margin-bottom: -2px;"></p>    
            <?php echo date('l, d-M-Y');?>
            <input type="text" id="nik_user" value="<?php echo $data['nik'] ?>" hidden readonly/>    
        </div>
        <a class="list-group-item list-group-item-action bg-light" id="dashboard"><i class="fa fa-home" style="color:#17a2b8; margin-right:-1px;"></i>Dashboard</a>
        <a class="list-group-item list-group-item-action bg-light" id="surat_jalan"><i class="fa fa-dolly-flatbed" style="color:#17a2b8; margin-right:-3px;"></i>Surat Jalan</a>
    </div>
    
<script>
     $(function () {     
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var dropdown = document.getElementsByClassName("dropdown-btn");
        var i;
        for (i = 0; i < dropdown.length; i++) {
            dropdown[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var dropdownContent = this.nextElementSibling;
                if (dropdownContent.style.display === "block") {
                    dropdownContent.style.display = "none";
                }else{
                dropdownContent.style.display = "block";
                }
            });
        }

        $('#dashboard').css('cursor', 'pointer');
        $('#surat_jalan').css('cursor', 'pointer');

        $('#dashboard').click(function () {  
            window.location.href='dashboard-' + 
            [
                'dashboard',
                $('#nik').val()
            ];
        });

        $('#surat_jalan').click(function () {  
            window.location.href='surat_jalan-' + 
            [
                'surat_jalan',
                $('#nik').val()
            ];
        });
      
    })
   
</script>

</body>
</html> 
