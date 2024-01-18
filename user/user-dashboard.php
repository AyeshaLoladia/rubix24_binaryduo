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

// Retrieve announcements from the database
$sqlAnnouncements = "SELECT * FROM announcements ORDER BY created_at DESC LIMIT 5";
$resultAnnouncements = $conn->query($sqlAnnouncements);

// Retrieve upcoming events or activities from the hypothetical events table
$sqlCommunityEvents = "SELECT * FROM communityevents WHERE start_date >= CURDATE() ORDER BY start_date LIMIT 5";
$resultCommunityEvents = $conn->query($sqlCommunityEvents);

// Close the database connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">




<!-- Custom CSS -->
<style>
    body {
        font-family: 'Nunito', sans-serif;
        background-color: #f5f5f5;
    }

    .bg-primary-light {
        background-color: #e5ecf6;
    }

    .text-gray-800 {
        color: #343a40 !important;
    }

    .border-bottom {
        border-bottom: 1px solid #e5e5e5;
    }

    .rounded-pill {
        border-radius: 50rem !important;
    }

    .card {
        border: none;
        border-radius: 1rem;
        box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.1);
    }

    .card-header {
        background-color: #e5ecf6;
        border-radius: 1rem 1rem 0 0;
        padding: 1.5rem;
    }

    .card-body {
        padding: 1.5rem;
    }

    .card-title {
        font-weight: 700;
        margin-bottom: 0.5rem;
    }

    .card-text {
        margin-bottom: 1.5rem;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1.5rem !important;
    }

    .mt-4,
    .my-4 {
        margin-top: 2.5rem !important;
    }

    .me-4,
    .mx-4 {
        margin-right: 1.5rem !important;
    }

    .pe-4,
    .px-4 {
        padding-right: 1.5rem !important;
    }

    .fs-4 {
        font-size: 1.5rem;
    }

    .text-muted {
        color: #6c757d !important;
    }

    @media (min-width: 992px) {
        .col-lg-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
    }
</style>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons -->
    <link href="../images/logo.png" rel="icon">
    <link href="../images/logo.png" rel="apple-touch-icon">

    <title>Community Member</title>

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
                <div class="container-fluid logo-bg">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Welcome
                            <?php echo $username ?>
                        </h1>

                    </div>


                    <div class="row">
                        <!-- Announcements -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Announcements</h4>
                                </div>
                                <div class="card-body">
                                    <?php while ($announcement = $resultAnnouncements->fetch_assoc()): ?>
                                        <p class="card-text">
                                            <?php echo $announcement['title']; ?>
                                        </p>
                                        <p class="card-text">
                                            <?php echo $announcement['content']; ?>
                                        </p>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Community Events -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Community Events</h4>
                                </div>
                                <div class="card-body">
                                    <?php while ($event = $resultCommunityEvents->fetch_assoc()): ?>
                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h5 class="card-title">
                                                    <?php echo $event['title']; ?>
                                                </h5>
                                                <p class="card-text">
                                                    <?php echo $event['description']; ?>
                                                </p>
                                                <p class="card-text">
                                                    <?php echo $event['location']; ?>
                                                </p>
                                                <p class="card-text"><strong>Start Date:</strong>
                                                    <?php echo date('M d, Y', strtotime($event['start_date'])); ?>
                                                </p>
                                                <p class="card-text"><strong>End Date:</strong>
                                                    <?php echo date('M d, Y', strtotime($event['end_date'])); ?>
                                                </p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
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
                            <div class="modal-body">Select "Logout" below if you are ready to end your current session.
                            </div>
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


              

</body>

</html>