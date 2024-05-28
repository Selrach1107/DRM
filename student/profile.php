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
    <title>profile</title>
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
                    <h3 class="text-center">Department of Computer Study</h3>
                    <p class="text-center">Cavite State University CCAT-Campus</p>
                </div>
            </div>
        </div>
    </div>
    
    
    
    <!--SideBar-->
    
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!--<a class="navbar-brand" href="#">Menu</a>-->
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
        <div class="row justify-content-center">
            <div class="col-mid-6">
                <div class="card mt-4 ml-5 mr-5  bg-light" style="width:400px; height: 420px;">
                    <img class="card-img-top mt-4" src="../images/student.png" alt="Card image" style="width:50%">
                    <div class="card-body">
                        <br>
                      <h4 class="card-title">CHRISTIAN CHARLES MABACAS</h4>
                      <p class="card-text"><strong>Status: </strong>STUDENT</p>
                      <p class="card-text"><strong>Grade/Section: </strong>302/A</p>
                      <p class="card-text"><strong>Department: </strong>DCS</p>
                      <!--<a href="#" class="btn btn-primary">See Profile</a>-->
                    </div>
                </div>
            </div>
            <div class="col-mid-6">
                <div class="card mt-4 ml-5 mr-5" style="width:400px; height: 420px;">
                    <div class="card-body  bg-light">
                      <h4 class="card-title">PERSONAL INFORMATION</h4>
                      <hr>
                      <form>
                        <div class="row">
                            <div class="col">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" placeholder="CHRISTIAN CAHRLES" readonly name="first_name">
                            </div>
                            <div class="col">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" placeholder="MABACAS" readonly name="first_name">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <label for="teacher_id">Student ID:</label>
                                <input type="text" class="form-control" id="teacher_id" placeholder="202010570" readonly name="teacher_id">
                            </div>
                            <div class="col mt-2">
                                <label for="sex">Sex:</label>
                                <input type="text" class="form-control" id="sex" placeholder="Male" readonly name="sex">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col mt-2">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" placeholder="christian9@gmail.com" readonly name="email">
                            </div>
                        </div>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script>
  $(document).ready(function() {
    $('#profilePicInput').on('change', function(event) {
      var input = event.target;
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#profilePic').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
      }
    });
  });
</script>
</body>
</html>