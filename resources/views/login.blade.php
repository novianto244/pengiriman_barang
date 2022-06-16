<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengiriman Barang - Login</title>
    <link rel="shortcut icon" href="<?php echo asset('favicon.png'); ?>">  
    <link href="assets/bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="assets/login-style.css" rel="stylesheet">
</head>

<body oncontextmenu="return false">
    <div class="loginBox"> <img class="user" src="public/user-login.png" height="120px" width="115px">
        <center>
            <h3>PENGIRIMAN BARANG</h3>
        </center>

        <form action="{{ route('login') }}" method="post">
            @csrf
            @if(session('errors'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Something it's wrong:
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                    <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif
            @if (Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                </div>
            @endif
            @if (Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <div class="inputBox"> 
                <input id="username" type="text" name="username" placeholder="Username" required autocomplete="off"> 
                <input id="password" type="password" name="password" placeholder="Password" required> 
            </div> 
            
            <input type="submit" name="" value="Login">
        </form>  
        <center>
            <div style="text-align: center; margin-top:25px; color:#2e2e4b; font-size:12px;">
                © 2022 <br>
                PT Jaya Kencana
            </div>
        </center>
    </div>

    <div style="text-align: center; position: fixed; bottom:15px; left:15px;">
        <a class="nav-link" href="http://202.150.134.110" style="text-decoration: none; color:white;">
            <img src="public/back-home.png" style="width:65px; height:auto; background-color:white; border-radius:10px; box-shadow: 5px 5px 8px #14141436; padding:5px;" /> </br>
            Home
        </a>
    </div>

<script type="text/javascript">
    // Prevent back button browser
    history.pushState(null, null, location.href);
    history.back();
    history.forward();
    window.onpopstate = function () { history.go(1); };
</script>

</body>
</html>