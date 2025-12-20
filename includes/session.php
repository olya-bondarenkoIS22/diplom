<?php
session_start();

function isLoggedIn() {
    return isset($_SESSION['user_id']) && $_SESSION['user_id'] === true;
}

function setUserSession($userData) {
    $_SESSION['user_id'] = $userData['id'];
    $_SESSION['user_login'] = $userData['login'];
    $_SESSION['user_phone_number'] = $userData['phone_number'];
    $_SESSION['logged_in'] = true;
}

function destroySession() {
    session_unset();
    session_destroy();
}

function getUserName() {
    return isset($_SESSION['user_login']) ? $_SESSION['user_login'] : '';
}
?>