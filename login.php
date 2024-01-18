<?php
// Include database connection file (db_connection.php)
include('db_connection.php');

// Process login form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Retrieve user data from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Set session variables or any other user-specific data if needed
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['role'] = $row['role']; // Assuming 'role' is a column in your users table

            // Redirect based on user role
            switch ($_SESSION['role']) {
                case 'Community Member':
                    header("Location: user/user-dashboard.php");
                    break;
                case 'NGO/Gram Panchayat Representative':
                    header("Location: gmrepre/repre-dashboard.php");
                    break;
                case 'Admin':
                    header("Location: admin/admin-dashboard.php");
                    break;
                // Add more cases as needed for different roles
                default:
                    header("Location: default_dashboard.php");
                    break;
            }

            // Ensure that no further code is executed after the header() function
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }

    $conn->close();
}
?>

<!-- Rest of the HTML form remains the same -->
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicons -->
    <link href="images/logo.png" rel="icon">
    <link href="images/logo.png" rel="apple-touch-icon">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link href="assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    

    <!-- Custom styles for this template-->
    <link href="assets\css\sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qQXAb2luUW9inWMDVj2NmhHui9/A30j6Y/7 resources/css/font-awesome.min.css" crossorigin="anonymous" />

</head>

<body style="background-color:#1d3892;">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block" style="background-image: url('images/fulllogo.png'); background-position: center; background-repeat: no-repeat; background-size: contain;">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form method="post" action="login.php">
                                        <div class="form-group">
                                            <label for="username"><i class="fas fa-user"></i> Username:</label>
                                            <input type="text" class="form-control" id="username" name="username" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password"><i class="fas fa-key"></i> Password:</label>
                                            <input type="password" class="form-control" id="password" name="password" required>
                                        </div>

                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p> Don't have an account? <a class="" href="register.php"><i class="fas fa-user-plus"></i> Create Account</a></p>
                                       
                                    </div>
                                    <div class="text-center">
                                        <p id="message"></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="assets/js/sb-admin-2.min.js"></script>

</body>

</html>