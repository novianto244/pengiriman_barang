<!DOCTYPE html>
<html>
<head>
	<title>Pengiriman Barang</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">  
    <link rel="shortcut icon" href="<?php echo asset('favicon.png'); ?>">  
    
    <!-- Bootstrap -->
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Sweet Alert --> 
    <script src="assets/sweetalert/sweetalert2.js"></script>

    <!-- Chartjs --> 
    <script src="assets/chartjs/Chart.js"></script>
    
    <!-- Sidebar Menu -->
    <link rel="stylesheet" href="assets/sidebar/css/simple-sidebar.css" />
    
    <!-- DataTables -->
    <script src="assets/datatables/js/jquery.js"></script> 
    <link href="assets/datatables/css/jquery.dataTables.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/datatables/css/rowGroup.dataTables.min.css" />
    <script src="assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="assets/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="assets/datatables/js/dataTables.rowGroup.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Timeline -->
    <link rel="stylesheet" href="assets/bootstrap/css/timeline-1.css" />

    <!-- select2 -->
    <link href="assets/jquery/select2/select2.css" rel="stylesheet" />
    <script src="assets/jquery/select2/select2.min.js"></script>

    <!-- datepicker bootstrap -->
    <script src="assets/datepicker/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="assets/datepicker/datepicker.css">

    <!-- Custom Function Datatables -->
    <script type="text/javascript" src="assets/jquery/function-custom.js"></script>

    <!-- MD5 -->
    <script src="assets/jquery/jquery.md5.min.js"></script>

</head>
<body style="background-image: url(public/bg-content.jpg); height: 100%; background-position: center; background-repeat: no-repeat; background-size: cover;">
  <div class="d-flex" id="wrapper">

  <!-- Sidebar -->
  <div class="bg-light border-right" id="sidebar-wrapper">
		<div class="sidebar-heading" style="background-image: url(public/header-menu.png);">
      <img src="public/logo.png" alt="logo_journal" style="width:23px; height:23px;">
      <a href="/pengiriman_barang" style="color: white; font-size:15px; text-decoration:none">PENGIRIMAN BARANG</a></div>
		<div class="list-group list-group-flush">
      <?php include('php/menu.php'); ?>
		</div>
	  </div>
  <!-- /#sidebar-wrapper -->
  
  <!-- Page Content -->
	<div id="page-content-wrapper">		
		<nav class="navbar navbar-expand-lg navbar-light bg-dark border-bottom" style="background-image: url(public/header-title.png);">
		  <button class="btn btn-primary btn-xs" id="menu-toggle">Menu</button>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		  </button>
		  
      <h6 style="padding:10px 0px 5px 15px;"> @yield('judul_halaman') </h6>	 
          
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
          <li class="nav-item active" style="background-color:#26384900 !important">
            <a id="about" style="color:white;" class="nav-link"><i class="fa fa-info-circle" style="margin-right:-15px;"></i>About</a>
          </li>
          <li class="nav-item active" style="background-color:#26384900 !important">
            <a class="nav-link" style="color:white;" href="{{ route('logout') }}"
                onclick="event.preventDefault();
              document.getElementById('logout-form').submit();">
              <i class="fa fa-window-close" style="margin-right:-18px;"></i>
              {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
              @csrf
            </form>
          </li>
        </ul>
		  </div>

		</nav>
    
		<div class="container-fluid">	
			@yield('content')
		</div>
	</div>
  <!-- Page Content-wrapper -->
  
</div>
<!-- Wrapper -->
  

  <!-- Menu Toggle Script -->
  <script type="text/javascript">
    $(function(){
      $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
      });

      $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
      });

      $('#about').css('cursor', 'pointer');

      $('#about').click(function () {  
        window.location.href='about' + '-' + 
        [
          'about',
          $('#nik').val(),
        ];
      });

      
      
    });  
  </script>


</body>
</html>