<?php

session_start();
ob_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    $userID = $_SESSION['user_id'];
    $userEmail = $_SESSION['user_email'];
    $login = 1;
    /* echo 'Login'; */
} else {
    /* echo 'Out'; */
    $login = 0;
}

if (isset($_SESSION['user_location'])) {
    $userLocation = $_SESSION['user_location'];
    //echo $userLocation;
} else {
    //echo "Set Location";

    //$_SESSION['user_location'] = "Random Lol";
}

if (isset($_GET['restro_id'])) {
    $restro_id = filter_var($_GET['restro_id'], FILTER_SANITIZE_NUMBER_INT);
    //echo $userLocation;
} else {
    if (isset($_SERVER['HTTP_REFERER'])) {
        header("location: " . $_SERVER['HTTP_REFERER']);
    } else {
        die('Error 404');
    }
}

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
    <title>Booking the Restro | RestroBook</title>
</head>

<body>
    <!-- <div class="nav-div">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="index.php">
                    <img src="images/rb1.png" alt="RestroBook" width="50" height="50">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/booked.html">Booked</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Location</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">jaipur</a></li>
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
                        <a class="nav-item  btn btn-info" href="#" role="button">LogIN</a>
                        <a class="nav-item btn btn-info " href="#" role="button">SignUP</a>
                    </div>
                </div>
            </div>
        </nav>
    </div> -->

    <?php include_once('assets/navigation.php'); ?>
    <!-- Booking Page -->

    <?php
    $db = new dbConnect;
    $query = 'SELECT * FROM restaurant WHERE restro_id = :restro_id';
    $stmt_restro = $db->connect()->prepare($query);
    $stmt_restro->bindParam(':restro_id', $restro_id);
    $stmt_restro->execute();
    $dataShow = $stmt_restro->fetch(PDO::FETCH_ASSOC);

    ?>

    <div class="d-flex flex-column justify-content-center mt-5 mx-md-n5">
        <h2 class="text-center px-md-5 text-uppercase"><?php echo $dataShow['restro_name']; ?></h2>
        <h2 class="text-center px-md-5"><?php echo $dataShow['restro_tab_avl']; ?> Tables Available</h2>

    </div>

    <?php if ($dataShow['restro_tab_avl'] > 0) { ?>

        <div class="booking main">
            <div class="image-sec">
                <img src="images/<?php echo $dataShow['restro_image']; ?>">
            </div>
            <div class="form-sec">
                <form action="backend/assets/check.php" id="booking_form" onsubmit="bookingSubmit(event);" method="post">
                    <input type="hidden" name="restro_id" value="<?php echo $restro_id ?>">
                    <?php if ($login == 1) { ?>
                        <input type="hidden" name="user_id" value="<?php echo $userID ?>">
                    <?php } ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="form-label">Date</span>
                                <input class="form-control" id="booking_date" name="book_date" type="date" min=<?php echo date("Y-m-d") ?> required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="form-label">Time</span>
                                <select class="form-control selectt" id="booking_time" name="book_time" required>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="form-label">Phone No.</span>
                                <input class="form-control" name="book_phone" type="tel" maxlength="10" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <span class="form-label">Guests</span>
                                <select class="form-control selectt" name="book_guest" required>

                                    <option value="2">1-2</option>
                                    <option value="4">2-4</option>
                                    <option value="6">5-6</option>
                                    <option value="8">6-8</option>
                                    <option value="10">8-10</option>
                                    <option value="15">10-15</option>
                                </select>
                                <span class="select-arrow"></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-btn">
                        <button class="submit-btn" id="submit-btn" name="book_submit">Book Now</button>
                    </div>
                </form>
            </div>
        </div>

    <?php }  ?>
    <!-- Booking Page End -->

    <?php include_once("assets/footer.php"); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/script.js"></script>
    <script type="module" src="js/booking.js"></script>
</body>

</html>