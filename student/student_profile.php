<?php
// Start session and include necessary files
session_start();
require_once "../admin/db_connection.php"; // Include your database connection file

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login_form.php");
    exit();
}

// Handle file upload if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["profile_picture"])) {
    $user_id = $_SESSION['user_id'];
    $upload_dir = "profile_pictures/"; // Directory where profile pictures will be uploaded
    $file_name = basename($_FILES["profile_picture"]["name"]);
    $target_file = $upload_dir . $file_name;

    // Check if file is an image
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    } else {
        // Upload file to server
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            // Update database with profile picture file path
            $sql = "UPDATE users SET profile_picture = '$target_file' WHERE id = $user_id";
            if ($conn->query($sql) === TRUE) {
                
            } else {
                echo "Error updating profile picture: " . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Retrieve user information from database
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM users WHERE id = $user_id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Profile</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <!--Header-->
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg  border d-flex align-items-center justify-content-center">
                <a class="navbar-brand ml-3">
                    <img src="../images/CVSU_LOGO.png" alt="logo" style="width: 100px; height: 100px;">
                </a>
                <div>
                    <h3 class="text-center fw-bold">Department of Computer Study</h3>
                    <p class="text-center text-success">Cavite State University CCAT-Campus</p>
                </div>
            </div>
        </div>
    </div>

    <!--SIDE BAR-->
    <div class="wrapper">
        <aside id="sidebar">
            <!--MENU-->
            <div class="d-flex">
                <button class="toggle-btn" type="button">
                    <i class="lni lni-menu"></i>
                </button>
                <!--LOGO-->
                <div class="sidebar-logo">
                    <a href="admin_dash.html">DRM</a>
                </div>
            </div>

            <!--SIDE BAR MODULES-->
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="student_profile.php" class="sidebar-link">
                        <i class="lni lni-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="adm_add.html" class="sidebar-link"> 
                        <i class="lni lni-plus"></i>
                        <span>Add Announcement</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="adm_ann.html" class="sidebar-link">
                        <i class="lni lni-bullhorn"></i>
                        <span>Announcement</span>
                    </a>
                </li>
                <li class="sidebar-item">
                  <a href="adm_usersmanage.html" class="sidebar-link">
                      <i class="lni lni-customer"></i>
                      <span>Users Management</span>
                  </a>
              </li>
                <li class="sidebar-item">
                    <a href="../admin/change_password_form.php" class="sidebar-link">
                        <i class="lni lni-protection"></i>
                        <span>Account Security</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="#" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>           
        </aside>


    <!--CONTENT-->
    <div class="main p-3">
        <h2><strong>Student Profile</strong></h2>
        <div class="row">
            <div class="col-md-6 ">
                <div class="card mt-4 ml-5 mr-5  ">
                <div class="mt-3">
                    <div class="rounded-circle border border-dark d-flex align-items-center justify-content-center" style="width: 90px; height: 90px; overflow: hidden; margin-left: 20px;">
                        <img src="<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>  
                </div>

                    <!-- Form for Uploading Profile Picture -->
                    <form style=" margin-left: 40px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group">
                            <!-- Hidden file input -->
                            <input type="file" class="form-control" id="profile_picture" name="profile_picture" accept="image/*" onchange="updateFileName(this)" style="display: none;">

                            <!-- Choose file button with Camera Icon -->
                            <label for="profile_picture" style="cursor: pointer;">
                                <i class="fa fa-camera" aria-hidden="true"></i>
                            </label>

                            <!-- Add space between icons -->
                            <span class="mx-2"></span>

                            <!-- Upload button with Upload Icon -->
                            <button type="submit" style="border: none; background: none; padding: 0;">
                                <i class="fa fa-upload" aria-hidden="true"></i>
                            </button>
                        </div>
                    </form>

                
                    <div class="card-body">
                        <h4 class="card-title text-uppercase"><strong><?php echo htmlspecialchars($user['first_name']) . " " . htmlspecialchars($user['last_name']); ?></strong></h4>
                        <p class="card-text"><strong>Status: </strong><?php echo htmlspecialchars($user['role']); ?></p>
                        <p class="card-text"><strong>ID No: </strong><?php echo htmlspecialchars($user['id_no']); ?></p>
                        <p class="card-text"><strong>Department: </strong>DCS</p>
                        <!--<a href="#" class="btn btn-primary">See Profile</a>-->
                    </div>
                </div>
            </div>
            <div class="col-md-6 ">
                <div class="card mt-4 ml-5 mr-5">
                    <div class="card-body">
                        <h4 class="card-title">PERSONAL INFORMATION</h4>
                        <hr>
                        <form>
                            <div class="row">
                                <div class="col">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" class="form-control" id="first_name" readonly name="first_name" value="<?php echo htmlspecialchars($user['first_name']); ?>">
                                </div>
                                <div class="col">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" class="form-control" id="last_name" readonly name="last_name" value="<?php echo htmlspecialchars($user['last_name']); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-2">
                                    <label for="teacher_id">ID No:</label>
                                    <input type="text" class="form-control" id="teacher_id" readonly name="teacher_id" value="<?php echo htmlspecialchars($user['id_no']); ?>">
                                </div>
                                <div class="col mt-2">
                                    <label for="sex">Sex:</label>
                                    <input type="text" class="form-control" id="sex" readonly name="sex" value="<?php echo htmlspecialchars($user['sex']); ?>">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col mt-2">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" id="email" readonly name="email" value="<?php echo htmlspecialchars($user['email']); ?>">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>

</html>
