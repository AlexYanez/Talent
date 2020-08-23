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

      <form class="form-signin" action="<?= ROUTE_URL; ?>/pages/signin" method="POST">
          <legend class="form-signin-heading text-center">Sign in</legend>
          <br>
          <!-- E-mail -->
          <label for="inputEmail" class="sr-only">Username</label>
          <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" required autofocus>
          <br>
          <!-- Password -->
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" >
          <a href="<?php echo ROUTE_URL; ?>/pages/signup" class="btn btn-light">or Create an account</a>
          <br>
          <br>
          <?php !empty($error_message) ? print($error_message) : '' ?>
          <?php if(isset($_GET["fail"]) && $_GET["fail"] == 'true')
          {  echo "<div style='color:red'> Email or password incorrect </div>"; }
          ?>
          <!-- Button -->
          <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
          
      </form>

    </div> <!-- /container -->

    <!-- Custom styles for this template -->
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #fff;
      }

      .form-signin {
        max-width: 330px;
        padding: 15px;
        margin: 0 auto;
      }
      .form-signin .form-control {
        position: relative;
        height: auto;
        -webkit-box-sizing: border-box;
           -moz-box-sizing: border-box;
                box-sizing: border-box;
        padding: 10px;
        font-size: 16px;
      }
      .form-signin .form-control:focus {
        z-index: 2;
      }
      .form-signin input[type="email"] {
        margin-bottom: -1px;
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0;
      }
      .form-signin input[type="password"] {
        margin-bottom: 10px;
        border-top-left-radius: 0;
        border-top-right-radius: 0;
      }
    </style>

  </body>

  <script type="text/javascript" src="<?php echo ROUTE_URL; ?>/js/main.js"></script>
</html>





