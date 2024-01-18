<?php
session_start();
// Include database connection file (db_connection.php)
include('db_connection.php');

// Fetch community members data from the database
$community_members_result = $conn->query("SELECT * FROM users WHERE role = 'Community Member'");

// Fetch NGO Gram/Panchayat representatives data from the database
$ngo_representatives_result = $conn->query("SELECT * FROM users WHERE role = 'NGO/Gram Panchayat Representative
'");


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

    <title>Admin</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

   

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
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Users List
                        </h1>
                       
                    </div>

                    
                    <div class="row">
                    <div class="col-12">
                        <h3>Community Members</h3>
                        <div class="row">
                            <?php
                            if ($community_members_result->num_rows > 0) {
                                while($row = $community_members_result->fetch_assoc()) {
                                    echo "
                                    <div class='col-md-4 mb-4'>
                                        <div class='card h-100'>
                                            <div class='card-body'>
                                                <h4 class='card-title'>" . $row["username"] . "</h4>
                                                <p class='card-text'>" . $row["email"] . "</p>
                                            </div>
                                            <div class='card-footer text-muted'>
                                                Registered at " . $row["created_at"] . "
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                }
                            } else {
                                echo "<div class='col-12'>No community members found</div>";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <h3>NGO/GramPanchayat Representatives</h3>
                        <div class="row">
                            <?php
                            if ($ngo_representatives_result->num_rows > 0) {
                                while($row = $ngo_representatives_result->fetch_assoc()) {
                                    echo "
                                    <div class='col-md-4 mb-4'>
                                        <div class='card h-100'>
                                            <div class='card-body'>
                                                <h4 class='card-title'>" . $row["username"] . "</h4>
                                                <p class='card-text'>" . $row["email"] . "</p>
                                            </div>
                                            <div class='card-footer text-muted'>
                                                Registered at " . $row["created_at"] . "
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                }
                            } else {
                                echo "<div class='col-12'>No NGO Gram/Panchayat representatives found</div>";
                            }
                            ?>
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