<?php include 'dbconfig.php' ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, maximum-scale=2.0">
<title> Login</title>
<script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles-landing.css" rel="stylesheet" />
        <!--Ajax GoogleApis-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        
		
<link rel="stylesheet" href="/bootstrap-5.2.0-beta1-dist/css/bootstrap.min.css">

</head>
<body>
     <!-- Navigation-->
     <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/index.html"><img src="/startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/assets/img/LOGO-WEBACADEMIE-2019-QUADRI-2048x367.png" alt="logo" width="300" height="auto"></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="/startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/index.html#about">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="/startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/index.html#projects">Projects</a></li>
                        <li class="nav-item"><a class="nav-link" href="/startbootstrap-grayscale-gh-pages/startbootstrap-grayscale-gh-pages/index.html#signup">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://cinema/">Search</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <br><br><br> <br>
<div class="container">
        <div class="card">

            <div class="card-header">Login</div>

            <div class="card-body">

                <div id="error-msg" class="alert alert-danger" role="alert"></div>

                <form id="login-form" action="/login.php" method="post" name="login-form">
                <div class="mb-3">
                        <label for="email">Email address</label> 
                        <input id="email" class="form-control" name="email" required type="email" placeholder="Enter email"></div>
                        <div class="mb-3">
                        <label for="password">Password</label> 
                        <input id="password" class="form-control" name="password" re type="password" placeholder="Password">
                    </div>
                    <button id="login" class="btn btn-primary" type="submit">Login</button>
                </form>

            </div>
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="jquery-1.12.4-jquery.min.js"></script>
    <script src="/bootstrap-5.2.0-beta1-dist/js/bootstrap.min.js"></script>

    <script>
        $(function() {
            $("#error-msg").hide(); 
            $('#login').click(function(e) {

                let self = $(this);

                e.preventDefault(); // prevent default submit behavior

                self.prop('disabled', true);

                var data = $('#login-form').serialize(); // get form data

                // sending ajax request to login.php file, it will process login request and give response.
                $.ajax({
                    url: '/login.php',
                    type: "POST",
                    data: data,
                }).done(function(res) {
                    res = JSON.parse(res);
                    if (res['status']) // if login successful redirect user to secure.php page.
                    {
                        location.href = "secure.php"; // redirect user to secure.php location/page.
                    } else {

                        var errorMessage = '';
                        // if there is any errors convert array of errors into html string, 
                        //here we are wrapping errors into a paragraph tag.
                        console.log(res.msg);
                        $.each(res['msg'], function(index, message) {
                            errorMessage += '<div>' + message + '</div>';
                        });
                        // place the errors inside the div#error-msg.
                        $("#error-msg").html(errorMessage);
                        $("#error-msg").show(); // show it on the browser, default state, hide
                        // remove disable attribute to the login button, 
                        //to prevent multiple form submissions 
                        //we have added this attribution on login from submit
                        self.prop('disabled', false);
                    }
                }).fail(function() {
                    alert("error");
                }).always(function() {
                    self.prop('disabled', false);
                });
            });
        });
    </script>
</body>
</html>