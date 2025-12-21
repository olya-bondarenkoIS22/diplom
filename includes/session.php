<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
}

function setUserSession($userData) {
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['user_login'] = $userData['login'];
    $_SESSION['user_phone_number'] = $userData['phone_number'];
    $_SESSION['logged_in'] = true;
    $_SESSION['user_date_registration'] = $userData['date_registration'];
}

function destroySession() {
    session_unset();
    session_destroy();
}

function getUserName() {
    return isset($_SESSION['user_login']) ? $_SESSION['user_login'] : '';
}
?>