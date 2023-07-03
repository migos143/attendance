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
  <div id="dashboard">
    <div class="container-fluid p-0">
          <nav class="navbar ">
              <div class="container-fluid">
              <a href="admindashboard.php" class="text-decoration-none h2">ADMIN</a>
              <div  class="navbar-nav">
                <a class="nav-link" href="logout.php"><i class="fa fa-right-to-bracket"></i>Log out</a>
              </div>
              </div>
          </nav>
      </div>  
      <div class="container my-5">
          <div>
            <input type="text" class="search " id="searchInput" placeholder="search">
          </div>
          <div class="table">

          <table class="table table-responsive  table mt-3 " id="myTable">
              <thead>
                <tr>
                  <th class="text-center ms-5">NO</th>
                  <th class="text-center ms-5">username</th>
                  <th class="text-center ms-5">ID</th>
                  <th class="text-center ms-5">Status</th>
                  <th class="text-center ms-5">Date Joined</th>
                  <th class="text-center ms-5">Time Joined</th>
                  <th class="text-center ms-5">Action</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="all in AllAttendance">
                  <td col="2" class="text-center me-5">{{ all.attenId }}</td>
                  <td col="2" class="text-center me-5">{{ all.username }}</td>
                  <td col="2" class="text-center me-5">{{ all.id }}</td>
                  <td col="2" class="text-center me-5">{{ all.statusName }}</td>
                  <td col="2" class="text-center me-5">{{ all.dateCreated }}</td>
                  <td col="2" class="text-center me-5">{{ all.timeCreate }}</td>
                  <td col="2" class="text-center me-5">
                    <button class="btn btn-sm btn-danger" @click="deleteUser(all.attenId)">Delete</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
  </div>
  <script src="../javascript/vue.3.js"></script>
  <script src="../javascript/axios.js"></script>
  <script src="../javascript/alluser.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#searchInput').on('keyup', function() {
        var value = $(this).val().toLowerCase();
        $('#myTable tbody tr').each(function() {
          var cellText = $(this).find('td:eq(1)').text().toLowerCase();
          $(this).toggle(cellText.indexOf(value) > -1);
        });
      });
    });
  </script>
</body>
</html>