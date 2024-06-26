<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>
<body>
    <h6 class="mt-3 mr-3">Already have account? <a href="login_form.php">Log In</a></h6>
    <div class="container mt-3 mb-3 border" style="max-width: 400px;">
        <h2 class="mb-4 text-center">SIGN UP</h2>
        
        <form action="register.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3 row">
                <label for="firstName" class="col-sm-4 col-form-label">First Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="firstName" name="first_name" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="lastName" class="col-sm-4 col-form-label">Last Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="lastName" name="last_name" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idNumber" class="col-sm-4 col-form-label">ID Number</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="idNumber" name="id_no" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="idPicture" class="col-sm-4 col-form-label">Upload ID Picture</label>
                <div class="col-sm-8">
                    <input type="file" class="form-control" id="idPicture" accept="image/*" name="pic" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label class="col-sm-4 col-form-label">Sex</label>
                <div class="col-sm-8">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="male" required>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="female" required>
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="role" class="col-sm-4 col-form-label">Role</label>
                <div class="col-sm-8">
                    <select class="form-select" id="role" name="role" required>
                        <option value="" selected disabled>Select role</option>
                        <option value="admin">Admin</option>
                        <option value="teacher">Teacher</option>
                        <option value="student">Student</option>
                    </select>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="email" class="col-sm-4 col-form-label">Email address</label>
                <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="password" class="col-sm-4 col-form-label">Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="confirmPassword" class="col-sm-4 col-form-label">Confirm Password</label>
                <div class="col-sm-8">
                    <input type="password" class="form-control" id="confirmPassword" name="confirm_password" required>
                </div>
            </div>
            <div class="d-grid mb-3">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
