
<!doctype html>
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Online Grading System</title>

    <link rel="apple-touch-icon">
    <!-- <link rel="shortcut icon" href="img/favicon2.jpeg" /> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">
    <link rel="stylesheet" href="../assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="../assets/css/style2.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <!-- <img class="align-content" src="images/adminGreen.jpg" alt=""> -->
                    </a>
                </div>
                <div class="login-form">
                    <div id="messages"></div>
                    <form id="login-form" >    
                               <strong><h2 align="center">Administrator Login</h2></strong><hr>
                        <div class="form-group">
                            <label>Staff ID</label>
                            <input type="text" name="staff_id"  class="form-control" placeholder="Staff ID">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password">
                        </div><!-- Log on to codeastro.com for more projects! -->
                        <div class="checkbox">
                            <label class="pull-right">
                                <a href="#">Forgot Password?</a>
                            </label>
                        </div>
                        <br>
						<!-- Log on to codeastro.com for more projects! -->
                        <button type="submit" name="login" class="btn btn-success btn-flat m-b-30 m-t-30">Log in</button>
                    </form>
                </div>
            </div><!-- Log on to codeastro.com for more projects! -->
        </div>
    </div>
    <script>
		$(document).ready(function(){
        $('#login-form').on('submit', function(e){
        e.preventDefault();

        var formData = new FormData(this);
        $.ajax({
            url: '<?php echo site_url("login/validation"); ?>',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            dataType: 'json',
            success: function(response){
                if (response.status == 'error'){
                $('#messages').html('<div class="alert alert-danger">' + response.errors + '</div>');
                }
                else if (response.status == 'success'){
                    $('#messages').html('<div class="alert alert-success">' + response.message+ '</div>');
                    setTimeout(function(){
                        window.location.href = response.redirect;
                        },1000);
                }
            },
            error: function(xhr, status, error) {
                    console.error(xhr.responseText); // Log the full error response
                    // Display a generic error message to the user
                    $('#messages').html('<div class="alert alert-danger">An unexpected error occurred. Please try again later.</div>');
                }
        });
    });
});
</script>	

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="../assets/js/main.js"></script>

</body>
</html>
