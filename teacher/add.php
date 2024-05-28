<?php 
  include ('../connection.php');
  
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $message = $_POST['message'];
    $date = $_POST['date'];
    $prof_name =$_POST['prof_name'];

    $sql = "INSERT INTO announcement (message,date,prof_name) 
                      VALUES('$message','$date','$prof_name')";
    if($conn->query($sql) === TRUE){
        echo '<script>alert("Message has ben created!")</script>';
        echo '<script>window.location.href = "eventAct.php"</script>';
    }
    else{
        echo '<script>alert("Something wrong")</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <title>add</title>
</head>
<body>
    <!--Header-->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg bg-success text-white border d-flex align-items-center justify-content-center">
                <a class="navbar-brand ml-3">
                    <img src="../images/CVSU_LOGO.png" alt="logo" style="width: 100px; height: 100px;">
                </a>
                <div>
                    <h3 class="text-center">Department Relationship Management</h3>
                    <p class="text-center">Cavite State University CCAT-Campus</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!--SideBar-->
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
          <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <a class="navbar-brand text-white">
            <img src="../images/DRMW.jpg" class="rounded-circle" alt="logo" style="width: 50px; height: 50px;">
        </a>
        <ul class="navbar-nav" >
          <li class="nav-item">
              <a class="nav-link mr-3" href="dashboard.php">Dashboard</a>
          </li>
          <li class="nav-item">
              <a class="nav-link mr-3"  href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
              <a class="nav-link mr-3"  href="add.php">Add Announcement</a>
          </li>
          <li class="nav-item">
              <a class="nav-link  mr-3"  href="eventAct.php">Event & Announcement</a>
          </li>
          <li class="nav-item">
              <a class="nav-link mr-3" data-toggle="pill" href="#">Account Security</a>
          </li>
          <li class="nav-item">
              <a class="nav-link  mr-3" data-toggle="pill" href="#">Log Out</a>
          </li>
      </ul>
    </nav>

    <div class="container">
        <div class="row ">
            <div class="col-mid-6">
                <h2 class="mt-2"><strong><i class="fas fa-bullhorn"></i> Announcement</strong></h2>
                <div class="card mt-4 mr-5  bg-light" style="width:800px; height: 350px;">
                    <div class="card-body">
                        <form action="add.php" method="POST">
                            <div class="form-group">
                              <label for="message"><strong>Add New Announcement <i class="fas fa-plus"></i></strong></label>
                              <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                              <label for="prof_name"><strong>Name Of Instructor: </strong></label>
                              <input class="mt-3" type="text" id="prof_name" name="prof_name" placeholder="Name of Instructor"><br>
                              <label for="date"><strong>Date: </strong></label>
                              <input class="mt-3" type="date" id="date" name="date">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>