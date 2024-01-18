<?php
session_start();
// Include database connection file (db_connection.php)
include('db_connection.php');

// Get the users from the database
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

// Initialize the community members and representatives arrays
$community_members = array();
$representatives = array();

// Loop through the users
while ($user = mysqli_fetch_assoc($result)) {
  // Determine if the user is a community member or representative
  if ($user['role'] == 'Community Member') {
    $community_members[] = $user;
  } elseif($user['role'] == 'NGO/Gram Panchayat Representative
  ') {
    $representatives[] = $user;
  }
}


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

    <!-- Bootstrap core JavaScript -->
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for all pages -->
<script src="js/sb-admin-2.min.js"></script>

   

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
                        <h1 class="h3 mb-0 text-gray-800">Edit User Profiles
                        </h1>
                       
                    </div>

                    
                    <div class="row>
                        <div class="col-lg-6>
                            <div class="card shadow mb-4>
                                <div class="card-header py-3>
                                    <h6 class="m-0 font-weight-bold text-primary">Community Members
                                    </h6>
                                </div>
                                <div class="card-body>
                                    <ul class="list-unstyled"
                                        <!-- Loop through the community members -->
                                        <?php foreach ($community_members as $community_member) { ?>
                                            <li class="media mb-2>
                                                <img src="img/undraw_profile.svg" class="mr-3" alt="...">
                                                <div class="media-body"
                                                    <h5 class="mt-0 mb-1 font-weight-bold"><?php echo htmlspecialchars($community_member['username']); ?></h5>
                                                    <p><?php echo htmlspecialchars($community_member['email']); ?></p>
                                                    <!-- Add the edit and delete buttons -->
                                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-user-id="<?php echo htmlspecialchars($community_member['user_id']); ?>">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete-button" data-user-id="<?php echo htmlspecialchars($community_member['user_id']); ?>">Delete</a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6>
                            <div class="card shadow mb-4>
                                <div class="card-header py-3>
                                    <h6 class="m-0 font-weight-bold text-primary">Representatives
                                    </h6>
                                </div>
                                <div class="card-body>
                                    <ul class="list-unstyled"
                                        <!-- Loop through the representatives -->
                                        <?php foreach ($representatives as $representative) { ?>
                                            <li class="media mb-2"
                                                <img src="img/undraw_profile.svg" class="mr-3" alt="...">
                                                <div class="media-body"
                                                    <h5 class="mt-0 mb-1 font-weight-bold"><?php echo htmlspecialchars($representative['username']); ?></h5>
                                                    <p><?php echo htmlspecialchars($representative['email']); ?></p>
                                                    <!-- Add the edit and delete buttons -->
                                                    <a href="#" class="btn btn-primary btn-sm edit-button" data-user-id="<?php echo htmlspecialchars($representative['id']); ?>">Edit</a>
                                                    <a href="#" class="btn btn-danger btn-sm delete-button" data-user-id="<?php echo htmlspecialchars($representative['id']); ?>">Delete</a>
                                                </div>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </div>
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


    <!-- Edit User Modal-->
<div class="modal fade" id="editUserModal" tabindex="-1" role="dialog" aria-labelledby="editUserModalLabel" aria-hidden="true"
    <div class="modal-dialog" role="document"
        <div class="modal-content"
            <div class="modal-header"
                <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body"
                <!-- Edit User Form -->
                <form id="editUserForm"
                    <input type="hidden" id="userId" name="userId"
                    <div class="form-group"
                        <label for="username">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group"
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="form-group"
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                </form>
            </div>
            <div class="modal-footer"
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button id="updateUserButton" class="btn btn-primary" type="button">Update</button>
            </div>
        </div>
    </div>
</div>

<!-- Delete User Modal-->
<div class="modal fade" id="deleteUserModal" tabindex="-1" role="dialog" aria-labelledby="deleteUserModalLabel" aria-hidden="true"
    <div class="modal-dialog" role="document"
        <div class="modal-content"
            <div class="modal-header"
                <h5 class="modal-title" id="deleteUserModalLabel">Delete User</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to delete this user?</div>
            <div class="modal-footer"
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a id="deleteUserLink" class="btn btn-danger" href="#">Delete</a>
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

    <script>
        // Get the edit and delete buttons
        var editButtons = document.querySelectorAll(".edit-button")
        var deleteButtons = document.querySelectorAll(".delete-button")

        // Loop through the edit buttons
        editButtons.forEach(function(editButton) {
            editButton.addEventListener("click", function(event) {
                event.preventDefault()

                // Get the user ID from the button's data attribute
                var userId = editButton.getAttribute("data-user-id")

                // Set the values of the edit user form
                document.getElementById("userId").value = userId
                document.getElementById("username").value = "John Doe"
                document.getElementById("email").value = "john.doe@example.com"
                document.getElementById("password").value = "password"

                // Show the edit user modal
                $('#editUserModal').modal('show')
            })
        })

        // Loop through the delete buttons
        deleteButtons.forEach(function(deleteButton) {
            deleteButton.addEventListener("click", function(event) {
                event.preventDefault()

                // Get the user ID from the button's data attribute
                var userId = deleteButton.getAttribute("data-user-id")

                // Set the href of the delete link
                document.getElementById("deleteUserLink").href = "delete_user.php?id=" + userId

                // Show the delete user modal
                $('#deleteUserModal').modal('show')
            })
        })

        // Add the update user button click event
        document.getElementById("updateUserButton").addEventListener("click", function() {

            // Get the user ID from the hidden input field
            var userId = document.getElementById("userId").value

            // Get the form data
            var formData = new FormData(document.getElementById("editUserForm"))

            // Send the update request to the server
            fetch("update_user.php", {
                    method: "POST",
                    body: formData
                })
                .then(function(response) {
                    if (response.ok) {
                        $('#editUserModal').modal('hide')
                    } else {
                        alert("Error: " + response.statusText)
                    }
                })
                .catch(function(error) {
                    console.error("Error:", error)
                })
        })
    </script>

   

</body>

</html>