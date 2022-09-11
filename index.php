<?php
// Initialize Sessions
session_start();

// Determine if user is logged in
$is_logged_in = $_SESSION['is_logged_in'];

if ($is_logged_in === null || $is_logged_in === false) {
  header('location: login.php');
}
