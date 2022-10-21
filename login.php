<?php
ini_set('display_errors', 1);
session_start();

include_once './models/StudentModel.php';
include_once './models/AdminModel.php';
include_once './DTOs/Student.php';
include_once './DTOs/Admin.php';
include_once './models/Authentication.php';
include_once './mis/InputFilter.php';
include_once './mis/Preprocessor.php';


if (isset($_SESSION['is_logged_in']) &&  $_SESSION['is_logged_in'] == true) {
  Preprocessor::redirectUser();
}
?>

<?php

if (isset($_POST['email']) && isset($_POST['password'])) {

  $email = InputFilter::sanitizeField($_POST['email']);
  $password = InputFilter::sanitizeField($_POST['password']);

  $auth = new Authentication();

  if ($auth->loginStudent($email, $password)) {
    $auth->startUserSession($email, 'student');
    header('location: student/dashboard.php');
  }

  if ($auth->loginAdmin($email, $password)) {
    $model = new AdminModel();
    $user = $model->find($email);

    if ($user->adminRole != 'super') {
      $auth->startUserSession($email, 'admin');
      header('location: admin/dashboard.php');
    }

    if ($user->adminRole == 'super') {
      $auth->startUserSession($email, 'super-admin');
      header('location: super-admin/dashboard.php');
    }
  }

  $error =
    '<div class="alert alert-danger alert-dismissible" role="alert">
      Email or Password is incorrect. Try Again Please!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
} else {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $error =
      '<div class="alert alert-danger alert-dismissible" role="alert">
      Email or Password are required fields. Try Again Please!
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>';
  }
  $error = '';
}

?>

<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default" data-assets-path="assets/" data-template="vertical-menu-template-free">

<head>
  <title>Log In - Student Clearing System</title>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="assets/css/demo.css" />
  <link rel="stylesheet" href="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="assets/vendor/css/pages/page-auth.css" />
  <script src="assets/vendor/js/helpers.js"></script>
  <script src="assets/js/config.js"></script>
</head>

<body>
  <!-- Content -->

  <div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
        <!-- Register -->
        <div class="card">
          <div class="card-body">
            <!-- Logo -->
            <div class="app-brand justify-content-center">
              <a href="index.html" class="app-brand-link gap-2">
                <img src="./assets/img/logo.png" alt="logo" width="130px"><br>
              </a>
            </div>
            <!-- /Logo -->
            <h4 class="mb-2">Welcome to the SCS! 👋</h4>
            <p class="mb-4">Please sign-in to your account and start the adventure</p>

            <?= $error ?>

            <form id="formAuthentication" class="mb-3" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
              <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" autocomplete="off" autofocus required />
              </div>
              <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Password</label>
                  <a href="#">
                    <small>Forgot Password?</small>
                  </a>
                </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control" name="password" aria-describedby="password" required />
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
              </div>
              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Log in</button>
              </div>
            </form>
          </div>
        </div>
        <!-- /Register -->
      </div>
    </div>
  </div>
  <?php $error = '' ?>
  <script src="assets/vendor/libs/jquery/jquery.js"></script>
  <script src="assets/vendor/libs/popper/popper.js"></script>
  <script src="assets/vendor/js/bootstrap.js"></script>
  <script src="assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
  <script src="assets/vendor/js/menu.js"></script>
  <script src="assets/js/main.js"></script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>