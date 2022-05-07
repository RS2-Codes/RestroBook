<?php

if(isset($_POST['sessionSetterInit'])) {
    if($_POST['sessionSetterInit'] == 1) {
        session_start();
        $_SESSION['user_location'] = $_POST['sessionLocSetter'];
        echo 1;
    } else {
        echo 0;
    }
} else {
    header('location: '.$_SERVER['HTTP_REFERER']);
}

?>