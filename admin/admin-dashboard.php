<?php
session_start();
// Include database connection file (db_connection.php)
include('db_connection.php');


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