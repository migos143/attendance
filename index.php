<?php
  session_start();
  if(isset($_SESSION['userid'])){
    if($_SESSION['role'] == '1'){
      header('location: /attendance/system/dashboard.php');
    }else if($_SESSION['role'] == '2'){
      header('location: /attendance/system/admindashboard.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>attendance</title>
    <!--bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="./index.css">
    <!--fontawesome-->
    <script src="https://kit.fontawesome.com/14dda3807c.js" crossorigin="anonymous"></script>
</head>
<body>
  <div id="users">
    <div class="container-fluid p-0">
      <nav class="navbar navbar-expand-lg ">
          <div class="container-fluid">
          <h2>ATTENDANCE</h2>
          <div class="navbar-nav">
            <a class="nav-link" href="./system/register.php">register</a>
          </div>
          </div>  
      </nav>
  </div> 
  <div class="container">
      <div class="row d-flex justify-content-center align-items-center vh-100">
        <div class="col-lg-7 col-md-12 col-sm-12 ">
          <img src="./2.jpg"alt="" class="img float-md-start">  
        </div>
        <div class="col-lg-5 col-md-12 col-sm-12">
          <form @submit="loginUser">
              <div class=" mb-3">
                <input type="text" name="username" class="form-control rounded-5 mb-5 py-3 border-dark" id="id" placeholder="Username" >
              </div>
              <div class=" mb-3" style="margin-left: 4px;">
                <input type="password" name="password" class="form-control rounded-5 py-3 mb-5 border-dark" id="password" placeholder="Password">
              </div>
              <div class="  d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary rounded-5 col-3 btn-sm">LOG IN</button>
              </div>
              <div class="d-flex justify-content-center align-items-center">
                <p>You don't have an account<span><a href="./system/register.php" class="text-dark" style="text-decoration: none;"> Register</a></span></p>
              </div>
        </div>
      </div>
  </div>
  </div>
  <script src="javascript/vue.3.js"></script>
  <script src="javascript/axios.js"></script>
  <script src="javascript/users.js"></script>
</body>
</html>