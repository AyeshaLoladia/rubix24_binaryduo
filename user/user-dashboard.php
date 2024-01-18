<?php
session_start();
// Include database connection file (db_connection.php)
include('db_connection.php');

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

    <title>Community Member</title>

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
                        <h1 class="h3 mb-0 text-gray-800">Welcome
                            <?php echo $_SESSION['username']; ?>
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
                                        <p class="card-text"><?php echo $announcement['title']; ?></p>
                                        <p class="card-text"><?php echo $announcement['content']; ?></p>
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
                                                <h5 class="card-title"><?php echo $event['title']; ?></h5>
                                                <p class="card-text"><?php echo $event['description']; ?></p>
                                                <p class="card-text"><?php echo $event['location']; ?></p>
                                                <p class="card-text"><strong>Start Date:</strong>
                                                    <?php echo date('M d, Y', strtotime($event['start_date'])); ?></p>
                                                <p class="card-text"><strong>End Date:</strong>
                                                    <?php echo date('M d, Y', strtotime($event['end_date'])); ?></p>
                                            </div>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Weather Information -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Weather Information</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Weather Information -->
<div class="col-lg-6 mb-4">
    <div class="card bg-primary-light">
        <div class="card-header">
            <h4 class="card-title text-gray-800">Weather Information</h4>
        </div>
        
    </div>
</div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Links -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Quick Links</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Quick links content -->
                                </div>
                            </div>
                        </div>

                        <!-- Community Engagement -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Community Engagement</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Community engagement content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Interactive Widgets -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Interactive Widgets</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Interactive widgets content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Latest News and Research -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Latest News and Research</h4>
                                </div>
                                <div class="card-body">
                                    <!-- News and research content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Success Stories/Testimonials -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Success Stories/Testimonials</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Success stories content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Social Media Integration -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Social Media Integration</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Social media content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Community Alerts -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Community Alerts</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Community alerts content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Volunteer Opportunities -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Volunteer Opportunities</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Volunteer opportunities content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Community Spotlight -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Community Spotlight</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Community spotlight content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Polls and Surveys -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Polls and Surveys</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Polls and surveys content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Community Statistics -->
                        <div class="col-lg-6 mb-4">

```p>

                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Community Statistics</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Community statistics content from PHP -->
                                </div>
                            </div>
                        </div>

                        <!-- Feedback Mechanism -->
                        <div class="col-lg-6 mb-4">
                            <div class="card bg-primary-light">
                                <div class="card-header">
                                    <h4 class="card-title text-gray-800">Feedback Mechanism</h4>
                                </div>
                                <div class="card-body">
                                    <!-- Feedback mechanism content from PHP -->
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


    <script>
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(fetchWeather);
        } else {
            console.log("Geolocation is not supported by this browser.");
        }
    }

    function fetchWeather(position) {
    const lat = position.coords.latitude;
    const lon = position.coords.longitude;
    const apiKey = "31e3ee80db08af5463e81226fc175207";
    const url = `http://api.openweathermap.org/data/2.5/weather?lat=${lat}&lon=${lon}&appid=${apiKey}&units=metric`;

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data && data.cod == 200) {
                const temp = data.main.temp;
                const description = ucfirst(data.weather[0].description);
                const locationName = data.name;

                const weatherInfo = document.createElement("div");
                weatherInfo.classList.add("col-lg-6", "mb-4");

                const weatherCard = document.createElement("div");
                weatherCard.classList.add("card", "bg-primary-light");

                const weatherCardHeader = document.createElement("div");
                weatherCardHeader.classList.add("card-header");
                weatherCardHeader.innerHTML = `<h4 class="card-title text-gray-800">Weather Information for ${locationName}</h4>`;

                const weatherCardBody = document.createElement("div");
                weatherCardBody.classList.add("card-body");
                weatherCardBody.innerHTML = `
                    <p class='card-text'><strong>Temperature:</strong> ${temp}°C</p>
                    <p class='card-text'><strong>Description:</strong> ${description}</p>
                `;

                weatherCard.appendChild(weatherCardHeader);
                weatherCard.appendChild(weatherCardBody);
                weatherInfo.appendChild(weatherCard);

                const weatherContainer = document.querySelector("#weather-container");
                weatherContainer.appendChild(weatherInfo);
            } else {
                console.log("Unable to fetch weather information.");
            }
        })
        .catch(error => console.error(error));
}

    document.addEventListener("DOMContentLoaded", getLocation);
</script>

</body>

</html>