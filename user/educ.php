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

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">



<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicons -->
    <link href="../images/logo.png" rel="icon">
    <link href="../images/logo.png" rel="apple-touch-icon">

    <title>Education & Awareness</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Education & Awareness
                        </h1>

                    </div>


                     <!-- Row -->
                     <div class="row">

<!-- Column -->
<div class="col-lg-4 col-md-6 mb-4">

    <!-- Card -->
    <div class="card h-100">
        <!-- Card Header -->
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Water Conservation Tips</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <p>Learn about simple tips to conserve water at home and in your daily life.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
        </div>
    </div>

</div>

<!-- Column -->
<div class="col-lg-4 col-md-6 mb-4">

    <!-- Card -->
    <div class="card h-100">
        <!-- Card Header -->
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Water Usage by Sector</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <p>Explore the water usage by different sectors and learn about the impact of water usage on the environment.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
        </div>
    </div>

</div>

<!-- Column -->
<div class="col-lg-4 col-md-6 mb-4">

    <!-- Card -->
    <div class="card h-100">
        <!-- Card Header -->
        <div class="card-header">
            <h6 class="m-0 font-weight-bold text-primary">Water Conservation Technologies</a></h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <p>Learn about the latest water conservation technologies and how they can help conserve water.</p>
            <a href="#" class="btn btn-primary">Learn More</a>
        </div>
    </div>

</div>

</div>
<!-- Row -->

<!-- Row -->
<div class="row">

<!-- Column -->
<div class="col-lg-8 mb-4">

    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Water Security Documentary</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/MNyRIuF0sRU?si=3cPy-0AS1UMi_IH9" allowfullscreen></iframe>
            </div>
        </div>
    </div>

  

</div>

<!-- Column -->
<div class="col-lg-4 mb-4">

    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Water Quiz</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <p>Test your knowledge on water conservation and learn something new.</p>
            <a href="#" class="btn btn-primary">Take the Quiz</a>
        </div>
    </div>

</div>

</div>
<!-- Row -->

<!-- Row -->
<div class="row">

<!-- Column -->
<div class="col-lg-8 mb-4">

    <!-- Card -->
    <div class="card shadow mb-4">
        <!-- Card Header -->
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Latest Blogs</h6>
        </div>
        <!-- Card Body -->
        <div class="card-body">
            <div class="row">

                <!-- Blog Post -->
                <div class="col-lg-6 mb-4">

                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Card Image -->
                        <img class="card-img-top" src="img/blog1.jpg" alt="...">
                        <!-- Card Body -->
                        <div class="card-body">
                            <h6 class="card-title">Blog Post Title 1</h6>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>
                            <a href="#" class="btn btn-primary">Read More</a>
                        </div>
                    </div>

                </div>

                <!-- Blog Post -->
                <div class="col-lg-6 mb-4">

                    <!-- Card -->
                    <div class="card h-100">
                        <!-- Card Image -->
                        <img class="card-img-top" src="img/blog2.jpg" alt="...">
                        <!-- Card Body -->
        <div class="card-body">
            <h6 class="card-title">Blog Post Title 2</h6>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer nec odio. Praesent libero.</p>
            <a href="#" class="btn btn-primary">Read More</a>
        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

</div>

</div>
<!-- Row -->

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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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



</body>

</html>