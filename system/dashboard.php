<?php
  session_start();
  if(isset($_SESSION['userid'])){
    if($_SESSION['role'] == '2'){
      header('location: /attendance/system/admindashboard.php');
    }
  }else if(!isset($_SESSION['userid'])){
    header('location: ../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--booststrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <!--css-->
    <link rel="stylesheet" href="../style/dashboard.css">
     <!--fontawesome-->
     <script src="https://kit.fontawesome.com/14dda3807c.js" crossorigin="anonymous"></script>
</head>
    <title>Dashboard</title>
</head>
<body>
  <div id="attendance">
    <div class="container-fluid p-0">
        <nav class="navbar ">
            <div class="container-fluid">
            <h2>ATTENDANCE</h2>
            <div class="navbar-nav">
              <a class="nav-link" href="logout.php"><i class="fa fa-right-from-bracket"></i>log out</a>
            </div>
            </div>
        </nav>
    </div> 
    <div class="container ">
        <div class="row ">
          <div class="col-lg-5 col-12 ">
            <div class="container "> 
              <button class="btn" @click="insertTimein" id="timeIn" value="Time In">Time in</button>
              <button class="btn" @click="insertTimeout" id="timeOut" value="Time Out" >Time out</button>
              <div class="container" style="height: 400px; overflow-y: auto;">
                <table class="table-auto w-full table mt-3">
                  <thead>
                    <tr>
                      <th class="text-center ms-5">In/Out</th>
                      <th class="text-center ms-5">Date</th>
                      <th class="text-center ms-5">Time</th>
                    </tr>
                  </thead>
                    <tbody class="text-center" v-for="att in attendance">
                      <td>{{ att.status == 1 ? 'Time In' : 'Time Out' }}</td>
                      <td>{{ att.dateCreated }}</td>
                      <td>{{ att.timeCreate }}</td>
                    </tbody>
                </table>
              </div>
            </div>
          </div>
          <div class="col-lg-7 col-12">
           <img src="../2.jpg" alt="" class="img">
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../javascript/vue.3.js"></script>
  <script src="../javascript/axios.js"></script>
  <script src="../javascript/attendance.js"></script>
</body>
</html>