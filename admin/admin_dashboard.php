<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "registration_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];
    
    if ($action == 'approve') {
        // Handle approve action
        $user_id = $_POST['user_id'];
        $status = 'approved';
        $sql = "UPDATE users SET status='$status' WHERE id=$user_id";
        
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error: " . $conn->error;
        }
    } elseif ($action == 'reject') {
        // Handle reject action
        $user_id = $_POST['user_id'];
        $sql = "DELETE FROM users WHERE id=$user_id";
        
        if ($conn->query($sql) === TRUE) {
            
        } else {
            echo "Error: " . $conn->error;
        }
    }
}

// Get pending registrations
$sql = "SELECT * FROM users WHERE status='pending'";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" />
    <link rel="stylesheet" href="style.css">

    <?php
    // Prevent caching
    header("Cache-Control: no-cache, no-store, must-revalidate");
    header("Pragma: no-cache");
    header("Expires: 0");
    ?>


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
                    <a href="admin_dashboard.php">DRM</a>
                </div>
            </div>

            <!--SIDE BAR MODULES-->
            <ul class="sidebar-nav">
                <li class="sidebar-item">
                    <a href="admin_dashboard.php" class="sidebar-link">
                        <i class="lni lni-grid-alt"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="admin_profile.php" class="sidebar-link">
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
                    <a href="change_password_form.php" class="sidebar-link">
                        <i class="lni lni-protection"></i>
                        <span>Account Security</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="logout.php" class="sidebar-link">
                        <i class="lni lni-exit"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>           
        </aside>

        <!--CONTENT-->
        <div class="main p-3">
            <div class="row">
                <div class="col-md-7 mt-3">
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2>Pending Registrations</h2>
                            <p class="card-text">Details about the user registration request.</p>
                            <button class="btn btn-primary view-details-btn" data-bs-toggle="modal" data-bs-target="#detailsModal">View Details</button>
                        </div>
                        <!-- Modal -->
                        <div class="modal fade" id="detailsModal" tabindex="-1" aria-labelledby="detailsModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="detailsModalLabel">Registration Request Details</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                            <?php if ($result->num_rows > 0): ?>
                                            <?php while($row = $result->fetch_assoc()): ?>
                                                <div>
                                                    <p><strong>First Name: </strong><?php echo $row['first_name']; ?></p>
                                                    <p><strong>Last Name: </strong><?php echo $row['last_name']; ?></p>
                                                    <p><strong>ID Number: </strong><?php echo $row['id_no']; ?></p>
                                                    <p><strong>ID Picture: </strong><img src="uploads/<?php echo $row['pic']; ?>" alt="ID Picture" style="max-width: 500px;"></td>
                                                    <p><strong>Role: </strong><?php echo $row['role']; ?></p>
                                                    <p><strong>Email: </strong><?php echo $row['email']; ?></p> 
                                                    <div>
                                                        <form method="POST" style="display:inline-block;">
                                                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" name="action" value="approve" class="btn btn-success">Approve</button>
                                                        </form>
                                                        <form method="POST" style="display:inline-block;">
                                                            <input type="hidden" name="user_id" value="<?php echo $row['id']; ?>">
                                                            <button type="submit" name="action" value="reject" class="btn btn-danger">Reject</button>
                                                        </form>
                                                    </div>
                                                    <hr class="text-success" style="border-width:10px;">
                                            </div>
                                            <?php endwhile; ?>
                                        <?php else: ?>
                                        <div>
                                            <div colspan="7">No pending registrations</div>
                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
            crossorigin="anonymous"></script>
        <script src="script.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script>
                document.querySelector('.accept-btn').addEventListener('click', function() {
                    document.getElementById('responseMessage').innerHTML = '<div class="alert alert-success" role="alert">Request Accepted</div>';
                });
        
                document.querySelector('.decline-btn').addEventListener('click', function() {
                    document.getElementById('responseMessage').innerHTML = '<div class="alert alert-danger" role="alert">Request Declined</div>';
                });
            </script>
</body>
</html>

<?php $conn->close(); ?>