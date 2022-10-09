<?php

class Preprocessor
{
  public static function redirectUser()
  {
    switch ($_SESSION['user_type']) {
      case 'student':
        header('location: ../student/dashboard.php');
        break;
      case 'admin':
        header('location: ../admin/dashboard.php');
        break;
      case 'super-admin':
        header('location: ../super-admin/dashboard.php');
        break;
      default:
        header('location: ../login.php');
        break;
    }
  }
}
