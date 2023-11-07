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

$db = new dbConnect;
$query = 'SELECT * FROM restaurant WHERE restro_id = :restro_id';
$stmt_restro = $db->connect()->prepare($query);
$stmt_restro->bindParam(':restro_id', $restro_id);
$stmt_restro->execute();
$dataShow = $stmt_restro->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include_once "assets/header_links.php"; ?>

    <title><?php echo $dataShow['restro_name']; ?> | RestroBook</title>
</head>

<body>
    <?php include_once('assets/navigation.php'); ?>

    <!-- Booking Page -->

    <div class="container">

        <div class="d-flex justify-content-between align-items-center flex-wrap mt-5 mx-md-n5">
            <div>

                <h2 class="px-md-5 text-uppercase"><?php echo $dataShow['restro_name']; ?></h2>
                <p class="px-md-5 text-uppercase" style="font-size: 0.8rem;"><?php echo $dataShow['restro_desc']; ?></p>
            </div>
            <p class="text-center px-md-5 text-uppercase fs-6"><i class="fa-solid fa-house me-2"></i><?php echo $dataShow['restro_address']; ?></p>
        </div>
        <h2 class="text-center px-md-5"><?php echo $dataShow['restro_tab_avl']; ?> <?php echo $dataShow['restro_tab_avl'] > 0 ? 'Tables' : 'Table' ?> Available</h2>

        <?php if ($dataShow['restro_tab_avl'] > 0) { ?>

            <div class="booking main">
                <div class="image-sec">
                    <img src="images/<?php echo $dataShow['restro_image']; ?>">
                </div>
                <div class="form-sec">
                    <form action="backend/assets/conditional_check.php" id="booking_form" method="post">
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
    </div>

<?php }  ?>
<!-- Booking Page End -->

<?php include_once("assets/footer.php"); ?>

<?php include_once "assets/footer_links.php"; ?>

<script src="js/script.js"></script>
<script type="module" src="js/booking.js"></script>
</body>

</html>