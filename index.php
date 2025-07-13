<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Login Form</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link rel="stylesheet" href="style.css">
    </head>
    <style>

body {
            background-color: #1c1c1c;
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            color: #ffffff;
        }

        .row {
            display: flex;
        }

        .login-container {
            margin-top: 5%;
            margin-bottom: 5%;
        }
        /* .login-form-1 {
            margin-left: 10px;
        } */
        .login-form-1, .login-form-3 {
            margin-left: 20px;
            padding: 5%;
            background-color: #2b2b2b;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3);
            border-radius: 8px;
        }
        .login-form-space {
            padding: 1px;
        }
        .login-form-1 h3, .login-form-3 h3 {
            text-align: center;
            color: #ffffff;
            margin-bottom: 20px;
        }

        .form-control {
            background-color: #333333;
            border: 1px solid #555555;
            color: #ffffff;
        }

        .form-control::placeholder {
            color: #888888;
            font-style: italic;
            font-size: 14px;
        }

        .btnSubmit {
            width: 100%;
            border-radius: 4px;
            padding: 10px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            color: #ffffff;
            background-color: #d32f2f;
            transition: background-color 0.3s ease;
        }

        .btnSubmit:hover {
            background-color: #b71c1c;
        }

        .ForgetPwd {
            color: #d32f2f;
            font-weight: 600;
            text-decoration: none;
            display: block;
            margin-top: 10px;
            text-align: center;
        }

        .ForgetPwd:hover {
            color: #ffffff;
        }

        .login-container h4 {
            color: #ffffff;
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #ff6f6f;
            margin-bottom: 10px;
        }
    </style>
    <body >

<?php
 $emailmsg="";
 $pasdmsg="";
 $msg="";

 $ademailmsg="";
 $adpasdmsg="";


 if(!empty($_REQUEST['ademailmsg'])){
    $ademailmsg=$_REQUEST['ademailmsg'];
 }

 if(!empty($_REQUEST['adpasdmsg'])){
    $adpasdmsg=$_REQUEST['adpasdmsg'];
 }

 if(!empty($_REQUEST['emailmsg'])){
    $emailmsg=$_REQUEST['emailmsg'];
 }

 if(!empty($_REQUEST['pasdmsg'])){
  $pasdmsg=$_REQUEST['pasdmsg'];
}

if(!empty($_REQUEST['msg'])){
    $msg=$_REQUEST['msg'];
 }

 ?>



<div class="container login-container">
<img src="uploads/logo.jpeg" alt="Logo" style="width: 130px; margin-bottom: 1px; margin-left:42.5%"> 
<div class="row"><h4><?php echo $msg?></h4></div>
            <div class="row">
 
                <div class="col-md-5 login-form-3">
                    <h3>Admin Login</h3>
                    <form action="loginadmin_server_page.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                        </div>
                        <Label style="color:red">*<?php echo $ademailmsg?></label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                        </div>
                        <Label style="color:red">*<?php echo $adpasdmsg?></label>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                        <!-- <div class="form-group">

                            <a href="#" class="ForgetPwd" value="Login">Forget Password?</a>
                        </div> -->
                    </form>
                </div>
                <div class="col-md-1 login-form-space"></div>
                <div class="col-md-5 login-form-1">
                    <h3>Student Login</h3>
                    <form action="login_server_page.php" method="get">
                        <div class="form-group">
                            <input type="text" class="form-control" name="login_email" placeholder="Your Email *" value="" />
                        </div>
                        <Label style="color:red">*<?php echo $emailmsg?></label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="login_pasword"  placeholder="Your Password *" value="" />
                        </div>
                        <Label style="color:red">*<?php echo $pasdmsg?></label>
                        <div class="form-group">
                            <input type="submit" class="btnSubmit" value="Login" />
                        </div>
                    </form>
                </div>
            </div>
        </div>



        



        <script src="" async defer></script>
    </body>
</html>