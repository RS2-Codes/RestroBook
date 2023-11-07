<?php

/* Function for booking restaurant */

include_once 'check.php';

if (isset($_POST['restro_id'])) {
    if (!isset($_POST['user_id'])) {
        echo 1;
        exit;
    }
    if (!isset($_POST['book_time'])) {
        echo 3;
        exit;
    }
    $user_id = filter_var($_POST['user_id'], FILTER_SANITIZE_NUMBER_INT);
    $restro_id = filter_var($_POST['restro_id'], FILTER_SANITIZE_NUMBER_INT);
    $book_date = $_POST['book_date'];
    $book_time = $_POST['book_time'];
    $book_phone = filter_var($_POST['book_phone'], FILTER_SANITIZE_NUMBER_INT);
    $book_guest = filter_var($_POST['book_guest'], FILTER_SANITIZE_NUMBER_INT);
    $userBook = new userBook;
    $userBook->setUser_id($user_id);
    $userBook->setUser_restaurant_id($restro_id);
    $userBook->setUser_time($book_time);
    $userBook->setUser_date($book_date);
    $userBook->setUser_phone($book_phone);
    $userBook->setUser_guest($book_guest);
    if ($userBook->bookRestro() == 0) {
        $restroData = new restroData;
        $restroData->setrestroId($restro_id);
        $restroData->updateRestroTable(1);
        echo 2;
    } else {
        echo 0;
    }
}


if (isset($_POST['submit_delete'])) {
    $restro_id = filter_var($_POST['delete_restro_id'], FILTER_SANITIZE_NUMBER_INT);
    $delete_booked_id = filter_var($_POST['delete_booked_id'], FILTER_SANITIZE_NUMBER_INT);

    $db = new dbConnect;
    $query = "UPDATE user_book SET soft_delete = 'yes' WHERE user_book_id = :user_book_id";
    $stmt = $db->connect()->prepare($query);
    $stmt->bindParam(':user_book_id', $delete_booked_id);
    $stmt->execute();

    $restroData = new restroData;
    $restroData->setrestroId($restro_id);
    $restroData->updateRestroTable(0);

    header('location:' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['signup_username']) && isset($_POST['signup_email']) && isset($_POST['signup_password'])) {
    $signup_username = filter_var($_POST['signup_username'], FILTER_SANITIZE_ENCODED);
    $signup_email = filter_var($_POST['signup_email'], FILTER_SANITIZE_EMAIL);
    $signup_password = $_POST['signup_password'];
    $signup_password_hashed = password_hash($signup_password, PASSWORD_BCRYPT);

    $user = new user;
    $user->setUsername($signup_username);
    $user->setEmail($signup_email);
    $user->setPassword($signup_password_hashed);

    if ($user->createUser() == 0) {
        $user->setPassword($signup_password);
        if ($user->loginAccess() == 1) {
            echo 2;
        } else {
            echo 3;
        }
    } else {
        echo 1;
    }
}

if (isset($_POST['login_email']) && isset($_POST['login_password'])) {
    $login_email = $_POST['login_email'];
    $login_password = $_POST['login_password'];

    $user = new user;
    $user->setEmail($login_email);
    $user->setPassword($login_password);

    if ($user->loginAccess() == 1) {
        echo 1;
    } else {
        echo 0;
    }
}
