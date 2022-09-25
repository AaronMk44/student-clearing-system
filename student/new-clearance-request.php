<?php
session_start();

// -----------------------------------------------

include_once '../DTOs/Student.php';
include_once '../models/StudentModel.php';
include_once '../DTOs/Admin.php';
include_once '../models/AdminModel.php';

// -----------------------------------------------

$studentModel = new StudentModel();
$student = $studentModel->find($_SESSION['user_email']);

$adminModel = new AdminModel();
$hods = $adminModel->getHODs();

// -----------------------------------------------



?>

<!DOCTYPE html>


<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
  <title>Dashboard - Student | Clearing System</title>
  <meta name="description" content="" />
  <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico" />
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />
  <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
  <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
  <link rel="stylesheet" href="../assets/css/demo.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
  <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />
  <script src="../assets/vendor/js/helpers.js"></script>
  <script src="../assets/js/config.js"></script>
</head>

<body>
  <!-- Layout wrapper -->
  <div class="layout-wrapper layout-content-navbar">

    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
      <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
          <span class="app-brand-logo demo">
            <img src="../assets/img/logo.png" alt="logo" width="60px"><br>
          </span>
          <span class="app-brand-text demo menu-text fw-bolder ms-2">zuct</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
          <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
      </div>

      <div class="menu-inner-shadow"></div>

      <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
          <a href="dashboard.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="Analytics">Dashboard</div>
          </a>
        </li>

        <li class="menu-item">
          <a href="all-forms.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">All Forms</div>
          </a>
        </li>

        <li class="menu-item">
          <a href="approved-forms.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">Approved Forms</div>
          </a>
        </li>

        <li class="menu-item">
          <a href="pending-forms.php" class="menu-link">
            <i class="menu-icon tf-icons bx bx-collection"></i>
            <div data-i18n="Basic">Pending Forms</div>
          </a>
        </li>
      </ul>
    </aside>
    <!-- / Menu -->

    <!-- Layout container -->
    <div class="layout-page">
      <!-- Navbar -->

      <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
        <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
          <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
          </a>
        </div>

        <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
          <!-- Search -->
          <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
              <h4 class="pt-3">Student Clearing System</h4>
            </div>
          </div>
          <!-- /Search -->

          <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Place this tag where you want the button to render. -->


            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
              <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                <div class="avatar avatar-online">
                  <img src="../assets/img/avatars/user.jpg" alt class="w-px-40 h-auto rounded-circle" />
                </div>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li>
                  <a class="dropdown-item" href="#">
                    <div class="d-flex">
                      <div class="flex-shrink-0 me-3">
                        <div class="avatar avatar-online">
                          <img src="../assets/img/avatars/user.jpg" alt class="w-px-40 h-auto rounded-circle" />
                        </div>
                      </div>
                      <div class="flex-grow-1">
                        <span class="fw-semibold d-block"><?= $student->firstName . ' ' . $student->lastName ?></span>
                        <small class="text-muted">Student</small>
                      </div>
                    </div>
                  </a>
                </li>
                <li>
                  <div class="dropdown-divider"></div>
                </li>
                <li>
                  <a class="dropdown-item" href="../logout.php">
                    <i class="bx bx-power-off me-2"></i>
                    <span class="align-middle">Log Out</span>
                  </a>
                </li>
              </ul>
            </li>
            <!--/ User -->
          </ul>
        </div>
      </nav>

      <!-- / Navbar -->

      <!-- Content wrapper -->
      <div class="content-wrapper">
        <!-- Content -->
        <div class="layout-container">

          <div class="container flex-grow-1 container-p-y">
            <!-- Menu -->
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-style1">
                <li class="breadcrumb-item">
                  <a href="./dashboard.php">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="#">New Clearance Request</a>
                </li>
              </ol>
            </nav>

            <div class="card mb-4">
              <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                  <div class="card-body">
                    <h5 class="card-title text-primary">Clearance Request</h5>
                    <p class="mb-4">
                      Put in a reuest to get yourself <span class="fw-bold">cleared</span> before the term closes.
                    </p>
                  </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                  <div class="card-body pb-0 px-0 px-md-4">
                    <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png" data-app-light-img="illustrations/man-with-laptop-light.png" />
                  </div>
                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header">
                <h4>Clearance Request Form</h4>
              </div>
              <div class="card-body">
                <form action="./new-clearance-request.php" method="post">
                  <div class="mb-3">
                    <label for="html5-number-input" class="form-label">Enter Room Number</label>
                    <input class="form-control" type="number" min="1" max="250" required>
                  </div>
                  <div class="mb-3">
                    <label for="year-of-study-select" class="form-label">Year of Study</label>
                    <select id="year-of-study-select" class="form-select" required>
                      <option value="1">First</option>
                      <option value="2">Second</option>
                      <option value="3">Third</option>
                      <option value="4">Fourth</option>
                      <option value="5">Fifth</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="term-select" class="form-label">Term or Semester</label>
                    <select id="term-select" class="form-select" required>
                      <option value="term one">Term One</option>
                      <option value="term two">Term Two</option>
                      <option value="term three">Term Three</option>
                      <option value="semester one">Semester One</option>
                      <option value="semester two">Semester Two</option>
                    </select>
                  </div>
                  <div class="mb-3">
                    <label for="hod-select" class="form-label">Head of Department</label>
                    <select id="hod-select" class="form-select" required>
                      <?php foreach ($hods as $hod) : ?>
                        <option value="<?= $hod->email ?>"><?= $hod->firstName . ' ' . $hod->lastName ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <button class="btn btn-primary w-100" type="submit">Submit</button>
                </form>
              </div>
            </div>
          </div>
          <!-- / Content -->

          <!-- Footer -->
          <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">

            </div>
          </footer>
          <!-- / Footer -->

          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->
      </div>
      <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>
  </div>
  <!-- / Layout wrapper -->

  <!-- Core JS -->
  <!-- build:js assets/vendor/js/core.js -->
  <script src="../assets/vendor/libs/jquery/jquery.js"></script>
  <script src="../assets/vendor/libs/popper/popper.js"></script>
  <script src="../assets/vendor/js/bootstrap.js"></script>
  <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

  <script src="../assets/vendor/js/menu.js"></script>
  <!-- endbuild -->

  <!-- Vendors JS -->
  <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

  <!-- Main JS -->
  <script src="../assets/js/main.js"></script>

  <!-- Page JS -->
  <script src="../assets/js/dashboards-analytics.js"></script>

  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>