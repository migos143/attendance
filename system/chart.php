<?php
  session_start();
  if(isset($_SESSION['userid'])){
    if($_SESSION['role'] == '1'){
      header('location: ../system/dashboard.php');
    }
  }else if(!isset($_SESSION['userid'])){
    header('location: ../dashboard.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="../style/admin.css">
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/14dda3807c.js" crossorigin="anonymous"></script>
    <title>admindashboard</title>
</head>
<body>
    <div id="chart-app" style="height: 30vh;">
        <div class="container-fluid p-0">
            <nav class="navbar ">
                <div class="container-fluid">
                <a href="admindashboard.php" class="text-decoration-none h2">ADMIN</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="chart.php">chart</a>
                </div>
                <div  class="navbar-nav">
                    <a class="nav-link" href="logout.php"><i class="fa fa-right-to-bracket"></i>Log out</a>
                </div>
                </div>
            </nav>
        </div>
        </div>
        <div class="container justify-content-center align-item-center">
            <div class="charts border " style="width: 880px;">
                <canvas id="chart" class="chart" ></canvas>
            </div>
        </div>

    </div>
</body>
    <script src="../style/chart.js"></script>
    <script src="../javascript/vue.3.js"></script>
    <script src="../javascript/axios.js"></script>
    <script src="../javascript/chart.js"></script>
</html>    