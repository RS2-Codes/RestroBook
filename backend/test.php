<?php

session_start();
include_once('assets/check.php');

if (isset($_POST['insert_restro'])) {
    ob_start();
    session_start();
    $restro_name = $_POST['restro_name'];
    $restro_img_alt = $_POST['restro_img_alt'];
    $restro_tab_avl = $_POST['restro_tab_avl'];
    $restro_desc = $_POST['restro_desc'];
    $restro_category_id = $_POST['restro_category_id'];
    $restro_img = $_FILES['restro_img'];
    $restro_img_name = $_FILES['restro_img']['name'];
    $restro_img_temp_name = $_FILES['restro_img']['tmp_name'];
    $restro_img_size = round(($_FILES['restro_img']['size']) / 1024);

    $restro_img_valid_ext = array('jpg', 'jpeg', 'png', 'webp');

    $restro_img_ext = explode('.', $restro_img_name);
    $restro_img_ext = end($restro_img_ext);
    if (in_array($restro_img_ext, $restro_img_valid_ext)) {
        if (move_uploaded_file($restro_img_temp_name, '../../uploads/' . $restro_img_name)) {
            $insertFile = new restroData;
            $insertFile->setrestroCategoryId($restro_category_id);
            $insertFile->setrestroName($restro_name);
            $insertFile->setrestroDesc($restro_desc);
            $insertFile->setrestroImage($restro_img_name);
            $insertFile->setrestroImageAlt($restro_img_alt);
            $insertFile->setrestroTabAvl($restro_tab_avl);
            
            if ($insertFile->restroInsert()) {
                $_SESSION['restro_insert'] = 1;
                header('location:' . $_SERVER['HTTP_REFERER']);
            } else {
                $_SESSION['restro_insert'] = 0;
                header('location:' . $_SERVER['HTTP_REFERER']);
            }
        } else {
            echo "Failed to upload";
        }
    } else {
        echo "Not a valid Extension. <br> Redirecting in 3 secs";
        header('refresh: 3,url=' . $_SERVER['HTTP_REFERER']);
    }
}




/* $restro_name = "Mahakali Restaurant";
$restro_desc = 'Best in class restro, veg non-veg everthing';
$restro_img_name = 'mahakal.jpg';
$restro_img_alt = "Mahakali Restaurant";
$restro_email = "mahakalirestaurant@gmail.com";
$restro_address = "Allahabad";
$restro_city_id = "1";
$restro_pincode = "202023";
$restro_phone_no = "9999999999";
$restro_contact_no = "9999999999";

$insertFile = new restroData;
$insertFile->setrestroName($restro_name);
$insertFile->setrestroDesc($restro_desc);
$insertFile->setrestroImage($restro_img_name);
$insertFile->setrestroImageAlt($restro_img_alt);
$insertFile->setrestroEmail($restro_email);
$insertFile->setrestroAddress($restro_address);
$insertFile->setrestroCityId($restro_city_id);
$insertFile->setrestroPincode($restro_pincode);
$insertFile->setrestroPhoneNo($restro_phone_no);
$insertFile->setrestroContactNo($restro_contact_no);

$insertFile->restroInsert();  */


/* 
$restro_loc_city_name = "Unnao";

$restroLocInsert = new restroLocData;
$restroLocInsert->setrestroCityName($restro_loc_city_name);

$restroLocInsert->restroLocInsert();  

*/