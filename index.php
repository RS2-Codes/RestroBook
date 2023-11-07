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

include_once('backend/assets/check.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php include_once "assets/header_links.php"; ?>

    <title>RestroBook</title>
</head>

<body>
    <!-- NAVIGATION BAR -->
    <?php include_once('assets/navigation.php'); ?>
    <!-- RESTAURANT CARDS -->
    <div class="main">
        <ul class="cards">
            <?php

            if (isset($userLocation)) {
                $restroDetails = new restroData;
                $restroDetails->setrestroCityId($userLocation);
                /*
echo '<pre>';
print_r($restroDetails->restroLocByCity());
echo '</pre>';
*/

                foreach ($restroDetails->restroLocByCity() as $data) { ?>

                    <li class="cards_item">
                        <div class="col">
                            <div class="card border-0 custom-css">
                                <div class="card_image">
                                    <img src="images/<?php echo $data['restro_image']; ?>" alt="<?php echo $data['restro_image_alt']; ?>">
                                </div>
                                <div class="card-body card_content">
                                    <h2 class="card_title"><?php echo $data['restro_name']; ?></h2>
                                    <p class="card-text"><?php echo $data['restro_desc']; ?></p>

                                    <p class="card-text mt-2" style="font-size: 0.75rem;"><i class="fa-solid fa-location-dot me-1"></i><?php echo $data['restro_address']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <?php if ($data['restro_tab_avl'] > 0) { ?>
                                                <button type="button" class="btn btn-sm btn-outline-main"><a class="btn card_btn" href="booking.php?restro_id=<?php echo $data['restro_id']; ?>">Check Now</a></button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-sm btn-outline-main" disabled>No Availability</button>
                                            <?php } ?>

                                        </div>
                                        <small class="<?php echo $data['restro_tab_avl'] > 0 ? '' : 'text-muted' ?>"><?php echo $data['restro_tab_avl']; ?> <?php echo $data['restro_tab_avl'] > 0 ? 'Tables' : 'Table' ?></small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                <?php
                }
            } else { ?>

                <div class="card custom-body">
                    <div class="card_image">
                        <img src="images/jcsetlocationbro.png" alt="">
                    </div>
                    <div class="card-body">
                        <div class="card_link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">
                            Locations
                        </div>
                        <ul class="dropdown-menu custom-drop-color location-dropdown">
                            <?php foreach ($restro_locations->restroLocShow() as $restroLoc) {
                                if ($restroLoc['restro_loc_city_name'] == '') {
                                    continue;
                                }
                            ?>
                                <li><a class="dropdown-item loc_changer" href="#" data_loc_id='<?php echo $restroLoc['restro_loc_id']; ?>'><?php echo $restroLoc['restro_loc_city_name']; ?></a></li>
                            <?php
                                //echo $restroLoc['restro_loc_city_name'] . '<br>';
                            } ?>
                        </ul>
                    </div>
                </div>
            <?php
            }
            ?>

        </ul>
    </div>


    <!-- FOOTER -->

    <?php include_once("assets/footer.php"); ?>

    <?php include_once "assets/footer_links.php"; ?>
    <script src="js/script.js"></script>

</body>

</html>

<?php
$restro_locations = new restroLocData;

foreach ($restro_locations->restroLocShow() as $restroLoc) {
    if ($restroLoc['restro_loc_city_name'] == '') {
        continue;
    }
}
?>
<!-- <li><a class="dropdown-item loc_changer" href="#" data_loc_id='<?php echo $restroLoc['restro_loc_id']; ?>'><?php echo $restroLoc['restro_loc_city_name']; ?></a></li>
<?php
//echo $restroLoc['restro_loc_city_name'] . '<br>';
?> -->