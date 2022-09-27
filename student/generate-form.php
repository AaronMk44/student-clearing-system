<?php
session_start();

// -----------------------------------------------

if (
  $_SESSION['is_logged_in'] == null ||
  $_SESSION['is_logged_in'] == false
) {
  header('location: ../login.php');
}

// ---------------------------------------------

include_once '../models/ClearanceFormModel.php';
include_once '../models/StudentModel.php';
include_once '../DTOs/ClearanceForm.php';
include_once '../DTOs/Student.php';
require_once '../vendor/autoload.php';

$fmID = $_GET['id'];

$fm = new ClearanceFormModel();
$sm = new StudentModel();

$form = $fm->find($fmID);
$s = $sm->findByID($form->studentID);


$tpl =
  '
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
      font-family: Arial, Helvetica, sans-serif;
    }
    th{
      text-align: left;
    }
    th, td{
      padding: 5px;
    }
    </style>
  </head>
  <body>
    <table>
    <tr>
      <td><img src="../assets/img/logo.png" alt="Logo" width="70px"></td>
      <td><h2>Zambia University College of Technology</h2></td>
    </tr>
    </table>
    <div id="studentAndCourseDetails">
      <h3>Room Clearance Form</h3>
      <hr>
      <table>
        <tr>
          <th>Student\'s Name:</th>
          <td>' . $s->firstName . ' ' . $s->lastName . '</td>
        </tr>

        <tr>
          <th>Postal Address:</th>
          <td>' . $s->postalAddress . '</td>
        </tr>
        <tr>
          <th>Residential Address:</th>
          <td>' . $s->residentialAddress . '</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Student ID:</th>
          <td>' . $s->studentID . '</td>
          <th>NRC:</th>
          <td>' . $s->nrc . '</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Program Name:</th>
          <td>' . $s->program . '</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Course Coordinator:</th>
          <td>' . $form->hodName . '</td>
          <th>Sign:</th>
          <td>' . $form->hodApprovalStatus . '</td>
          <th>Date:</th>
          <td>' . date('d-m-Y', strtotime($form->hodApprovalDate)) . '</td>
        </tr>
      </table>
      <br>
    </div>
    <hr>
    <div id="librarianDetails">
      <h3>Library</h3>
      <table>
        <tr>
          <th>Library Status:</th>
          <td>Cleared/ Not Cleared</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Items Due:</th>
          <td>' . $form->libraryItemsDue . '</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Signed by the Librarian:</th>
          <td>' . $form->librarianApprovalStatus . '</td>
          <th>Date Signed:</th>
          <td>' . date('d-m-Y', strtotime($form->librarianApprovalDate)) . '</td>
        </tr>
      </table>
      <br>
    </div>
    <hr>
    <div id="accountsDetails">
      <h3>Accounts</h3>
      <table>
        <tr>
          <th>Accounts Status:</th>
          <td>Cleared or Not Cleared</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Running Balance:</th>
          <td>ZMW ' . $form->accountsRunningBalance . '</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Signed by Accountant:</th>
          <td>' . $form->accountantApprovalStatus . '</td>
          <th>Date Signed:</th>
          <td>' . date('d-m-Y', strtotime($form->accountantApprovalDate)) . '</td>
        </tr>
      </table>
      <br>
    </div>
    <hr>
    <div id="hostelRep">
      <h3>Hostels</h3>
      <table>
        <tr>
          <th>Hostel Status:</th>
          <td>Cleared or Not Cleared</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Items Due:</th>
          <td>' . $form->hostelItemsDue . '</td>
        </tr>
        <tr>
          <th>Room Number:</th>
          <td>' . $form->roomNo . '</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Signed by the Hostel Representative:</th>
          <td>' . $form->hostelRepApprovalStatus . '</td>
          <th>Date Signed:</th>
          <td>' . date('d-m-Y', strtotime($form->accountantApprovalDate)) . '</td>
        </tr>
      </table>
    </div>
    
  </body>
  </html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->writeHTML($tpl);
$mpdf->Output('Clearance Form.pdf', 'D');
