<?php

require_once '../vendor/autoload.php';

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
          <td>Some name</td>
        </tr>

        <tr>
          <th>Postal Address:</th>
          <td>Some address</td>
        </tr>
        <tr>
          <th>Residential Address:</th>
          <td>Some address again</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Student ID:</th>
          <td>Some id</td>
          <th>NRC:</th>
          <td>Some NRC</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Course Name:</th>
          <td>Some course</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Course Coordinator:</th>
          <td>Some id</td>
          <th>Sign:</th>
          <td>sig</td>
          <th>Date:</th>
          <td>Some date</td>
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
          <td>Cleared or Not Cleared</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Items Due:</th>
          <td>Some items</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Signed by the Librarian:</th>
          <td>The sig</td>
          <th>Date Signed:</th>
          <td>some date</td>
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
          <td>ZMW 0.00</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Signed by Accountant:</th>
          <td>The sig</td>
          <th>Date Signed:</th>
          <td>some date</td>
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
          <td>Some items</td>
        </tr>
        <tr>
          <th>Room Number:</th>
          <td>Some room</td>
        </tr>
      </table>
      <table>
        <tr>
          <th>Signed by the Hostel Representative:</th>
          <td>The sig</td>
          <th>Date Signed:</th>
          <td>some date</td>
        </tr>
      </table>
    </div>
    
  </body>
  </html>
';

$mpdf = new \Mpdf\Mpdf();
$mpdf->writeHTML($tpl);
$mpdf->Output('Clearance Form.pdf', 'D');
