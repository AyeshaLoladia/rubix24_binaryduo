<?php
session_start();
// Include database connection file (db_connection.php)
include('../db_connection.php');


// Check if the admin is logged in
if (!isset($_SESSION["username"])) {
    // Redirect to the login page if not logged in
    header("Location: ../login.php");
    exit();
}


// Check if the admin is logged in
if (!isset($_SESSION["profile_picture"])) {
    // Redirect to the login page if not logged in
    header("Location: ../login.php");
    exit();
}

// Get the admin's username from the session
$username = $_SESSION["username"];
$profile_picture = $_SESSION["profile_picture"];

// Function to delete a user by their ID
function deleteUser($user_id)
{
    // Include database connection file
    include('../db_connection.php');

    // Create a SQL query to delete the user with the given ID
    $sql = "DELETE FROM users WHERE user_id = $user_id";

    // Execute the query and check for errors
    if ($conn->query($sql) === FALSE) {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
}

// Check if the user ID is passed in the URL
if (isset($_GET['user_id']) && is_numeric($_GET['user_id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['user_id'];

    // Call the deleteUser function with the user ID passed as a parameter
    deleteUser($user_id);
}


?>


<!DOCTYPE html>
<html lang="en">





<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <!-- Favicons -->
    <link href="../images/logo.png" rel="icon">
    <link href="../images/logo.png" rel="apple-touch-icon">

    <!-- Custom styles for this template-->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Include the sidebar -->
        <?php include('sidebar.php'); ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">


                <!-- Include the topbar -->
                <?php include('topbar.php'); ?>

                <!-- Begin Page Content -->
                <div class="container-fluid bg-logo">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users List
                        </h1>

                    </div>
                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <!-- Users table here -->
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <!-- Table head here -->
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Profile Picture</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <!-- Table body here -->
                                    <tbody>
                                        <?php
                                        // Select all users from the database
                                        $sql = "SELECT * FROM users";
                                        $result = $conn->query($sql);

                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["user_id"] . "</td>";
                                                echo "<td>" . $row["username"] . "</td>";
                                                echo "<td>" . $row["email"] . "</td>";
                                                echo "<td>" . $row["contact_details"] . "</td>";
                                                echo "<td>" . $row["role"] . "</td>";
                                                echo "<td><img src='" . $row["profile_picture"] . "' alt='Profile Picture' width='50'></td>";
                                                echo "<td><a href='?user_id=" . $row["user_id"] . "' onclick=\"return confirm('Are you sure you want to delete this user?')\">Delete</a></td>";
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='5'>No users found</td></tr>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

            </div>


        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Your Website 2021</span>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
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