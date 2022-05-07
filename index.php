<?php

session_start();
if (isset($_SESSION['user_login'])) {
    if ($_SESSION['user_login'] === 1) {
        $userlogin = 1;
    }
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,200;0,300;0,400;0,500;0,600;1,200;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
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
                                <!-- <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>Placeholder</title>
                                    <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                                </svg> -->
                                <div class="card_image">
                                    <img src="images/<?php echo $data['restro_image']; ?>" alt="<?php echo $data['restro_image_alt']; ?>">
                                </div>


                                <div class="card-body card_content">
                                    <h2 class="card_title"><?php echo $data['restro_name']; ?></h2>
                                    <p class="card-text"><?php echo $data['restro_desc']; ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-main"><a class="btn card_btn" href="booking.php?restro_id=<?php echo $data['restro_id']; ?>">Check Now</a></button>
                                        </div>
                                        <small class="text-muted"><?php echo $data['restro_tab_avl']; ?> Tables</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card">
                            <div class="card_image"><img src="images/<?php echo $data['restro_image']; ?>" alt="<?php echo $data['restro_image_alt']; ?>"></div>
                            <div class="card_content">
                                <h2 class="card_title"><?php echo $data['restro_name']; ?></h2>
                                <p class="card_text"><?php echo $data['restro_desc']; ?></p>
                                <a class="btn card_btn" href="booking.php?restro_id=<?php echo $data['restro_id']; ?>">Check Now</a>
                            </div>
                        </div> -->
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

    <div>
        <div></div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
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