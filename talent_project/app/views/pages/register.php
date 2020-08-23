<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Local Styles -->
    <link rel="stylesheet" type="text/css" href="<?php echo ROUTE_URL; ?>/css/styles.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <form class="form-horizontal" name= "form-register" action="<?= ROUTE_URL; ?>/pages/signup" method="POST">
        <fieldset>
            <div id="legend">
            <legend class="form-signin-heading text-center">Create an account</legend>
            </div>
                <a href="<?php echo ROUTE_URL;?>/pages" class="btn btn-light"><i class="fa fa-backward"></i>Back</a>
                <div class="control-group">
                <!-- Username -->
                  <div class="controls">
                      <input type="text" id="username" name="username" placeholder="Username" class="form-control" required autofocus>
                  </div>
                </div>
                <br>
                <div class="control-group">
                <!-- E-mail -->
                  <div class="controls">
                      <input type="email" id="email" name="email" placeholder="Email address" class="form-control" required autofocus>
                  </div>
                </div>
                <br>
                <div class="control-group">
                <!-- Phone Number -->
                  <div class="controls">
                      <input type="text" id="phone" name="phone" class="form-control" placeholder="Phone Number" minlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;">  
                  </div>
                </div>
                <br>
                <div class="control-group">
                <!-- Password-->
                  <div class="controls">
                      <input type="password" id="password" name="password" placeholder="Password" minlength="6" class="form-control" ?>
                  </div>
                </div>
                <div class="control-group">
                <?php !empty($error_message) ? print($error_message) : '' ?>
                <br>
                <div class="control-group">
                <!-- Button -->
                  <div class="controls">
                      <button class="btn btn-lg btn-primary btn-block" onclick="CheckPassword(register.form-register.password)">Register</button>
                  </div>
                </div>
            </fieldset>
        </form>
    </div> <!-- /container -->

    <!-- Custom styles for this template -->
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #fff;
      }

      .form-horizontal {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-horizontal .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
      }
      .form-horizontal .form-control:focus {
        z-index: 2;
      }
      .form-horizontal input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-horizontal input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>

  </body>
  <script type="text/javascript" src="<?php echo ROUTE_URL; ?>/js/main.js"></script>
</html>
