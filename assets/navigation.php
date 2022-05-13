<div class="nav-div">
    <nav class="navbar navbar-expand-lg" style="background-color:rgba(0, 0, 0, 0.2)">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="images/RB.png" alt="RestroBook" width="50" height="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                    <?php if ($login == 1) { ?>
                        <li class="nav-item">
                            <a class="nav-link" href="booked.php">Booked</a>
                        </li>
                    <?php } ?>
                    <li class="nav-item dropdown">
                        <?php
                        $restro_locations = new restroLocData;
                        if (isset($userLocation)) {
                            $restro_locations->setrestroLocId($userLocation);
                            $restroLocs = $restro_locations->restroLocShowById();
                        ?>
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $restroLocs['restro_loc_city_name']; ?></a>
                        <?php } else { ?>
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Locations</a>
                        <?php }
                        ?>


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

                    </li>

                </ul>
                <style>

                </style>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <?php if ($login == 0) { ?>
                        <a class="login-trigger" id="login-trigger" href="#" data-target="#login" data-toggle="modal">Login/Register</a>
                    <?php } else { ?>
                        <div class="logged-user dropdown">
                            <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"><?php echo $userEmail; ?></a>
                            <ul class="dropdown-menu custom-drop-color location-dropdown">
                                <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                            </ul>

                        </div>
                        <a class="login-trigger" id="login-trigger" href="#" data-target="#login" data-toggle="modal" style="display: none;">Login/Register</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>
</div>