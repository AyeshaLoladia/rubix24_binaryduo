<?php
// Include database connection file (db_connection.php)
include('db_connection.php');

// Assume you have a user ID stored in the session
$user_id = $_POST['user_id'];
$username = $_POST['username'];
$email = $_POST['email'];
$contact_details = $_POST['$contact_details'];

// Handle profile picture upload
$profile_picture = ''; // Initialize an empty string for the profile picture path
 // Handle profile picture upload
 if ($_FILES['profile_picture']['error'] == 0) {
    $target_dir = 'uploads/'; // Update this path to the correct relative path from your PHP file
    $target_file = $target_dir . basename($_FILES['profile_picture']['name']);
    move_uploaded_file($_FILES['profile_picture']['tmp_name'], $target_file);

    // Add '../' to the beginning of the profile picture path
    $profile_picture = '../' . $target_file;
}

// Update user data in the database
$sql = "UPDATE users SET username='$username', email='$email', profile_picture='$profile_picture', contact_details='$contact_details'   WHERE user_id='$user_id'";

if ($conn->query($sql) === TRUE) {
    // Profile update successful
    echo "Profile updated successfully! Redirecting to profile page...";
    
    // Redirect to the profile page after a brief delay (2 seconds in this example)
    header("refresh:2;url=profile.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Edit Profile</h2>
                <form action="update_profile.php" method="post" enctype="multipart/form-data">
                    <!-- Assume you have a user ID stored in the session -->
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" readonly>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" value="<?php echo $username; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" value="<?php echo $email ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact Details</label>
                        <input type="contact" class="form-control" id="contact" name="contact" value="<?php echo $$contact_details?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <input type="role" class="form-control" id="role" name="role" value="<?php echo $role; ?>" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="profile_picture" class="form-label">Profile Picture</label>
                        <input type="file" class="form-control" id="profile_picture" name="profile_picture">
                        <!-- Display current profile picture -->
                        <?php if (!empty($profile_picture)) : ?>
                            <img src="<?php echo $profile_picture ?>" alt="Current Profile Picture" class="mt-2 img-thumbnail" style="max-width: 150px;">
                        <?php endif; ?>
                    </div>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</body>

</html>
