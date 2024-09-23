<?php session_start(); ?>

<link rel="stylesheet" href="popup_style.css">
<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
  <title>Parking app</title>


  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="This Parking Management System Developed by Mayuri K. Freelancer in india">
  <meta name="keywords" content="Mayuri K.freelancer in india">
  <meta name="author" content="Mayuri K">


  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="files/bower_components/bootstrap/css/bootstrap.min.css">

  <link rel="stylesheet" type="text/css" href="files/assets/icon/themify-icons/themify-icons.css">

  <link rel="stylesheet" type="text/css" href="files/assets/icon/icofont/css/icofont.css">

  <link rel="stylesheet" type="text/css" href="files/assets/css/style.css">

  <style>
    body {
      background-image: url('uploadImage/bg.jpg'); /* Specify the path to your image */
      background-size: cover;
      background-repeat: no-repeat;
      background-position: center;
      font-family: 'Open Sans', sans-serif; /* Ensure consistency in font family */
      /* Add any other styles you want for the body */
    }
  </style>

  <script>
    (function(w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-WLQ4RLB');
  </script>


</head>

<body class="fix-menu">
  <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WLQ4RLB" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>

  <?php
  include('connect.php');
  if (isset($_POST['btn_login'])) {
    $unm = $_POST['email'];
    $passw = hash('sha256', $_POST['password']);
    function createSalt()
    {
      return '2123293dsj2hu2nikhiljdsd';
    }
    $salt = createSalt();
    $pass = hash('sha256', $salt . $passw);
    //echo $pass;
    $sql = "SELECT * FROM admin WHERE email='" . $unm . "' and password = '" . $pass . "'";
    $result = mysqli_query($conn, $sql);
    $row  = mysqli_fetch_array($result);
    //print_r($row);
    $_SESSION["id"] = $row['id'];
    $_SESSION["username"] = $row['username'];
    $_SESSION["password"] = $row['password'];
    $_SESSION["email"] = $row['email'];
    $_SESSION["fname"] = $row['fname'];
    $_SESSION["lname"] = $row['lname'];
    $_SESSION["image"] = $row['image'];
    $_SESSION["role_id"] = $row["role_id"];
    $count = mysqli_num_rows($result);
    if (!empty($row) && isset($_SESSION["email"]) && isset($_SESSION["password"])) { {
  ?>
        <div class="popup popup--icon -success js_success-popup popup--visible">
          <div class="popup__background"></div>
          <div class="popup__content">
            <h3 class="popup__content__title">
              Success
            </h3>
            <p>Login Successfully</p>
            <p>
              <!--  <a href="index.php"><button class="button button--success" data-for="js_success-popup"></button></a> -->
              <?php
              if(  $_SESSION["role_id"] == 1)
              {
                echo "<script>setTimeout(\"location.href = 'index.php';\",1500);</script>";
              }
              else
              {
                echo "<script>setTimeout(\"location.href = 'booking.php';\",1500);</script>";
              }
               ?>
            </p>
          </div>
        </div>
        <!--   <script>
     window.location="index.php";
     </script> -->
      <?php
      }
    } else { ?>
      <div class="popup popup--icon -error js_error-popup popup--visible">
        <div class="popup__background"></div>
        <div class="popup__content">
          <h3 class="popup__content__title">
            Error
          </h3>
          <p>Invalid Email or Password</p>
          <p>
            <a href="login.php"><button class="button button--error" data-for="js_error-popup">Close</button></a>
          </p>
        </div>
      </div>
      <!--  <script> 
       // alert("Invalid email or Password!");
        window.location="login.php";
        </script> -->
  <?php
      //// $message = "Invalid email or Password!";
    }
  }
  ?>


  <section class="login-block">

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">



          <div class="auth-box card">
            <br>
            <div class="text-center">
            </div>
            <div class="card-block">

              <div class="row m-b-20">
                <div class="col-md-12">

                </div>
              </div>
              <form method="POST">
                <div class="form-group form-primary">
                  <input type="email" name="email" class="form-control" required="" placeholder="Email">
                  <span class="form-bar"></span>
                </div>
                <div class="form-group form-primary">
                  <input type="password" name="password" class="form-control" required="" placeholder="Password">
                  <span class="form-bar"></span>
                </div>
                <div class="row m-t-25 text-left">
                  <div class="col-12">

                    <!-- 
                    <div class="forgot-phone text-right f-right">
                      <a href="forgot_password.php" class="text-right f-w-600"> Forgot Password?</a>
                    </div> -->

                  </div>
                </div>
                <div class="row m-t-30">
                  <div class="col-md-12">
                    <button type="submit" name="btn_login" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">LOGIN</button>
                  </div>
                  <div class="col-md-12">
                    <a href="register.php" class="btn btn-success btn-md btn-block waves-effect text-center m-b-20">REGISTER NOW !!!</a>
                  </div>
                </div><br><br>
              </form>


            </div>
          </div>


        </div>

      </div>
    </div>
    </div>
  </section>


  </a></marquee>
  </footer>
  <script type="text/javascript" src="files/bower_components/jquery/js/jquery.min.js"></script>
  <script type="text/javascript" src="files/bower_components/jquery-ui/js/jquery-ui.min.js"></script>
  <script type="text/javascript" src="files/bower_components/popper.js/js/popper.min.js"></script>
  <script type="text/javascript" src="files/bower_components/bootstrap/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

  <script type="text/javascript" src="files/bower_components/modernizr/js/modernizr.js"></script>
  <script type="text/javascript" src="files/bower_components/modernizr/js/css-scrollbars.js"></script>

  <script type="text/javascript" src="files/bower_components/i18next/js/i18next.min.js"></script>
  <script type="text/javascript" src="files/bower_components/i18next-xhr-backend/js/i18nextXHRBackend.min.js"></script>
  <script type="text/javascript" src="files/bower_components/i18next-browser-languagedetector/js/i18nextBrowserLanguageDetector.min.js"></script>
  <script type="text/javascript" src="files/bower_components/jquery-i18next/js/jquery-i18next.min.js"></script>
  <script type="text/javascript" src="files/assets/js/common-pages.js"></script>


</body>



</html>