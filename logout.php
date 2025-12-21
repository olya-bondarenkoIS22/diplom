<?php
require_once 'includes/session.php';
require_once 'includes/functions.php';
logoutUser();
header("Location: index.php");
exit();
?>