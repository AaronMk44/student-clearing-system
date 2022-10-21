<?php
ini_set('display_errors', 1);

include_once './models/AdminModel.php';
include_once './DTOs/Student.php';
include_once './DTOs/Admin.php';
include_once './models/StudentModel.php';
include_once './models/AdminModel.php';

$adminModel = new AdminModel();

// ---------------------------------------------

$admin = new Admin();
$admin->firstName = 'Sam';
$admin->lastName =  'Mukuka';
$admin->email = 'sam@gmail.com';
$admin->gender = 'male';
$admin->adminRole = 'hod';
$admin->password = '123456789';
$adminModel->add($admin);

// ---------------------------------------------

$admin = new Admin();
$admin->firstName = 'John';
$admin->lastName =  'Doe';
$admin->email = 'john@gmail.com';
$admin->gender = 'male';
$admin->adminRole = 'accountant';
$admin->password = '123456789';
$adminModel->add($admin);


// ---------------------------------------------

$admin = new Admin();
$admin->firstName = 'Mary';
$admin->lastName =  'Doe';
$admin->email = 'mary@gmail.com';
$admin->gender = 'female';
$admin->adminRole = 'hostel_representative';
$admin->password = '123456789';
$adminModel->add($admin);

// ---------------------------------------------

$admin = new Admin();
$admin->firstName = 'Jack';
$admin->lastName =  'Doe';
$admin->email = 'jack@gmail.com';
$admin->gender = 'male';
$admin->adminRole = 'librarian';
$admin->password = '123456789';
$adminModel->add($admin);

// ---------------------------------------------

$admin = new Admin();
$admin->firstName = 'James';
$admin->lastName =  'Bond';
$admin->email = 'james@gmail.com';
$admin->gender = 'male';
$admin->adminRole = 'super';
$admin->password = '123456789';
$adminModel->add($admin);

// ---------------------------------------------

$s = new Student();
$s->studentID = '11111';
$s->firstName = 'Bright';
$s->lastName = 'Mumbi';
$s->gender = 'male';
$s->program = 'BSE';
$s->residentialAddress = 'somewhere in lusaka';
$s->postalAddress = '';
$s->email = 'bright.mumbi@gmail.com';
$s->password = '123456789';

// ------------------------------------------------


$s = new Student();
$s->studentID = '12345';
$s->firstName = 'Test';
$s->lastName = 'Student';
$s->gender = 'male';
$s->program = 'BSE';
$s->residentialAddress = 'somewhere in lusaka';
$s->postalAddress = '';
$s->email = 'test@gmail.com';
$s->password = '123456789';

(new StudentModel())->add($s);
