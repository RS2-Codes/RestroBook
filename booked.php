<?php

session_start();
ob_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    $userID = $_SESSION['user_id'];
    $userEmail = $_SESSION['user_email'];
    $login = 1;
} else {
    $login = 0;
}

if (isset($_SESSION['user_location'])) {
  $userLocation = $_SESSION['user_location'];
  //echo $userLocation;
} else {
  //echo "Set Location";

  //$_SESSION['user_location'] = "Random Lol";
}
/* 
if (isset($_GET['restro_id'])) {
    $restro_id = $_GET['restro_id'];
    //echo $userLocation;
  } else {
    header("location: ".$_SERVER['HTTP_REFERER']);
  } */

include_once('backend/assets/check.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Booked | RestroBook</title>
</head>

<body>
    <!-- <div class="nav-div">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">
                    <img src="images/rb1.png" alt="RestroBook" width="50" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/booked.html">Booked</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                                aria-expanded="false">Location</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">dropdown rhv kere ga backend se</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="cpadding">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </form>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a class="nav-item btn btn-info" href="#" role="button">LogIN</a>
                        <a class="nav-item btn btn-info" href="#" role="button">SignUP</a>
                    </div>
                </div>
            </div>
        </nav>
    </div> -->



    <?php include_once('assets/navigation.php'); ?>

    <!-- code here -->



    <h2 class="text-center mt-5 mb-3">Your Bookings</h2>
    <table>
        <thead>
            <tr>
                <th>Booking ID</th>
                <th>Restaurant Name</th>
                <th>Date</th>
                <th>Time</th>
                <th>No. of Guest</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
                $userBook = new UserBook;
                $userBook->setUser_id($userID);
                $bookedData = $userBook->bookedRestroFullData();
                foreach ($bookedData as $key) {
            ?>
            <tr>
                <td><?php echo $key['user_book_id']; ?></td>
                <td><?php echo $key['restro_name']; ?></td>
                <td><?php echo $key['user_date']; ?></td>
                <td><?php echo $key['user_time']; ?></td>
                <td><?php echo $key['user_guest']; ?></td>
                <td> <a onClick="javascript: return confirm('Please confirm deletion');" href="backend/assets/check.php?delete_booked_id=<?php echo $key['user_book_id']; ?>">Cancel Booking</a></td>
            </tr>
            <?php } ?>
            
        </tbody>
    </table>

    <?php include_once("assets/footer.php"); ?>

    <!-- <footer class="page-footer  font-small blue pt-4">
        <div class="container-fluid text-center text-md-left">
            <div class="row">
                <div class="col-md-6 mt-md-0 mt-3">
                    <h5 class="text-uppercase">Footer Content</h5>
                    <p>Here you can use rows and columns to organize your footer content.</p>
                </div>
                <hr class="clearfix w-100 d-md-none pb-3">
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-3 mb-md-0 mb-3">
                    <h5 class="text-uppercase">Links</h5>
                    <ul class="list-unstyled">
                        <li>
                            <a href="#!">Link 1</a>
                        </li>
                        <li>
                            <a href="#!">Link 2</a>
                        </li>
                        <li>
                            <a href="#!">Link 3</a>
                        </li>
                        <li>
                            <a href="#!">Link 4</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="footer-copyright text-center py-3">© 2021 Copyright: R2S2</div>

    </footer> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
</body>

</html>