<?php
// Include database connection file (db_connection.php)
include('db_connection.php');

// Process registration form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password for security
    $email = $_POST['email'];
    $role = $_POST['role'];
    $profile_picture = ''; // Initialize an empty string for the profile picture path
    $contact_details = $_POST['contact_details'];

    // Check if the email already exists
    $email_check_query = "SELECT * FROM users WHERE email='$email' LIMIT 1";
    $result = $conn->query($email_check_query);

    if ($result->num_rows > 0) {
        echo "Error: Email already exists!";
    } else {
        // Handle profile picture upload
        if ($_FILES['profile_picture']['error'] == 0) {
            $target_dir = 'uploads/'; // Update this path to the correct relative path from your PHP file
            $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
            move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);
            $profile_picture = $target_file;
        }

        // Insert user data into the database
        $sql = "INSERT INTO users (username, password, email, role, profile_picture, contact_details) 
                VALUES ('$username', '$password', '$email', '$role', '$profile_picture', '$contact_details')";

        if ($conn->query($sql) === TRUE) {
            // Registration successful
            echo "Registration successful! Redirecting to login page...";
            
            // Redirect to the login page after a brief delay (2 seconds in this example)
            header("refresh:2;url=login.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
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
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="assets\css\sb-admin-2.min.css" rel="stylesheet">

</head>

<body style="background-color:#1d3892">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block "
                                style="background-image: url('images/logo.png'); background-position: center; background-repeat: no-repeat; background-size: contain;">
                            </div>

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome!</h1>
                                    </div>
                                    <form method="post" action="register.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="username">Username:</label>
                                            <input type="text" class="form-control" id="username" name="username"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password:</label>
                                            <input type="password" class="form-control" id="password" name="password"
                                                required>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email:</label>
                                            <input type="email" class="form-control" id="email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="role">Role:</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="Community Member">Community Member</option>
                                                <option value="NGO/Gram Panchayat Representative">NGO/Gram Panchayat
                                                    Representative</option>
                                                   
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label for="profile_picture">Profile Picture:</label>
                                            <input type="file" class="form-control-file" id="profile_picture"
                                                name="profile_picture">
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_details">Contact Details:</label>
                                            <input type="text" class="form-control" id="contact_details"
                                                name="contact_details">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Register</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <p> Already have an account?  <a class="" href="login.php">Login</a></p>
                                        
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
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>


</body>

</html>




