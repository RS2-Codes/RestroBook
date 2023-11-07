<?php

session_start();
ob_start();
if (isset($_SESSION['user_id']) && isset($_SESSION['user_email'])) {
    $userID = $_SESSION['user_id'];
    $userEmail = $_SESSION['user_email'];
    $login = 1;
} else {
    $login = 0;
    include_once('backend/assets/error_403.php');
    if (isset($_SERVER['HTTP_REFERER'])) {
        header('Refresh:3,url=' . $_SERVER['HTTP_REFERER']);
    } else {
        header('Refresh:3,url=index.php');
    }
    exit;
    /* header('location:'.$_SERVER['HTTP_REFERER']); */
    //header("Refresh:5; url=index.php");
    //die('You are not logged in. Page is going to refresh in 5 seconds.');
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

    <?php include_once "assets/header_links.php"; ?>

    <title>Booked | RestroBook</title>
</head>

<body>

    <?php include_once('assets/navigation.php'); ?>

    <!-- code here -->


    <div class="container">

        <h2 class="text-center mt-4 mb-3">Your Bookings</h2>
        <div class="table_container">
            <table>
                <thead>
                    <tr>
                        <th>Booking ID</th>
                        <th>Restaurant Name</th>
                        <th>Restaurant Address</th>
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
                            <td><?php echo $key['restro_address']; ?></td>
                            <td><?php echo $key['user_date']; ?></td>
                            <td><?php echo $key['user_time']; ?></td>
                            <td><?php echo $key['user_guest']; ?></td>
                            <td>
                                <form action="backend/assets/conditional_check.php" method="post">
                                    <input type="hidden" name="delete_restro_id" value="<?php echo $key['restro_id']; ?>" />
                                    <input type="hidden" name="delete_booked_id" value="<?php echo $key['user_book_id']; ?>" />
                                    <input type="submit" name="submit_delete" onClick="javascript: return confirm('Please confirm deletion');" value="Cancel Booking" />
                                </form>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>

    </div>

    <?php include_once("assets/footer.php"); ?>

    <?php include_once "assets/footer_links.php"; ?>

    <script src="js/script.js"></script>
</body>

</html>