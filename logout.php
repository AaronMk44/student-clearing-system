<?php

session_start();
$_SESSION['is_logged_in'] = false;
$_SESSION['user_type'] = null;
$_SESSION['user_email'] = '';
session_unset();
session_destroy();
header('location: login.php');
