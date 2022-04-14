<?php
    session_start();
    if (!isset($_SESSION['usuario_id'])) {
            header("Location:ajustes.php");
       }
       $userid =$_SESSION['usuario_id'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <link rel="shortcut icon" type="image/x-icon" href="assets/img/logo.ico">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Ajustes</title>


  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<!-- CSS Files -->
<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
  <link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="red">
          <!--
            Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
        -->
        <div class="logo">

            <a class="simple-text logo-normal">
            Transportes Turisticos
            </a>
        </div>
        <div class="sidebar-wrapper" id="sidebar-wrapper">

            <ul class="nav">
                <?php
                    include "menu/common-menu.php";
                ?>
            </ul>
        </div>
    </div>
  </div>
    <!--   Core JS Files   -->
  <script src="transportista/assets/js/core/jquery.min.js"></script>
  <script src="transportista/assets/js/core/popper.min.js"></script>
  <script src="transportista/assets/js/core/bootstrap.min.js"></script>
  <script src="transportista/assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chart JS -->
  <script src="transportista/assets/js/plugins/chartjs.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="transportista/assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="transportista/assets/js/now-ui-dashboard.min.js" type="text/javascript"></script>
  <script src="transportista/assets/demo/demo.js"></script>
   <link href="vendor/datetimepicker-master/build/jquery.datetimepicker.min.css" rel="stylesheet" />
    <link href="css/sweetalert.css" rel="stylesheet" />
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      demo.initDashboardPageCharts();
    });
  </script>
</body>

</html>