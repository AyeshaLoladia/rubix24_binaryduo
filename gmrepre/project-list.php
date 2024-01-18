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


?>


<!DOCTYPE html>
<html lang="en">





<head>
    <!-- Favicons -->
    <link href="../images/logo.png" rel="icon">
    <link href="../images/logo.png" rel="apple-touch-icon">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Representative</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

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
                        <h1 class="h3 mb-0 text-gray-800">Projects List
                        </h1>

                    </div>

                    <!-- DataTables Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">All Projects</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                        <th>Project ID</th>
                                            <th>Project Title</th>
                                            <th>Description</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                            <th>Status</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                       

                                        // Write a SQL query to select all the projects from the database
                                        $sql = "SELECT * FROM projects";
                                        $result = $conn->query($sql);

                                        // Use a while loop to fetch the results of the query and display each project in a Bootstrap card
                                        if ($result->num_rows > 0) {
                                            // Output data of each row
                                            while ($row = $result->fetch_assoc()) {
                                                echo "<tr>";
                                                echo "<td>" . $row["project_id"] . "</td>";
                                                echo "<td>" . $row["title"] . "</td>";
                                                echo "<td>" . $row["description"] . "</td>";
                                                echo "<td>" . $row["start_date"] . "</td>";
                                                echo "<td>" . $row["end_date"] . "</td>";
                                                echo "<td>" . $row["status"] . "</td>";
                                                echo '<td><a href="view_project.php?id=' . $row["project_id"] . '" class="btn btn-primary">View</a></td>';
                                                echo '<td><button class="btn btn-danger delete-project-button" data-project-id="' . $row["project_id"] . '">Delete</button></td>';
                                                echo "</tr>";
                                            }
                                        } else {
                                            echo "<tr><td colspan='6'>No projects found</td></tr>";
                                        }

                                        // Close the database connection
                                        $conn->close();
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="row">


                        </div>
                        <!-- /.container-fluid -->
                    </div>

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
                        <a class="btn btn-primary" href="../login.php">Logout</a>
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

        <!-- Page level plugins -->
        <script src="vendor/chart.js/Chart.min.js"></script>

        <!-- Page level custom scripts -->
        <script src="js/demo/chart-area-demo.js"></script>
        <script src="js/demo/chart-pie-demo.js"></script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
  $(".delete-project-button").click(function(e) {
    e.preventDefault();
    var projectId = $(this).data("project_id");
    if (confirm("Are you sure you want to delete this project?")) {
      // Send a DELETE request to the server to delete the project
      $.ajax({
        url: "project-list.php",
        type: "POST",
        data: { project_id: projectId },
        success: function(response) {
          if (response === "success") {
            // Project deleted successfully, refresh the page
            location.reload();
          } else {
            alert("Error deleting project");
          }
        },
        error: function() {
          alert("Error deleting project");
        }
      });
    }
  });
});
</script>

</body>

</html>