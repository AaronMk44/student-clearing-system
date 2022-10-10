<?php

include_once './models/AdminModel.php';
include_once './DTOs/Student.php';
include_once './DTOs/Admin.php';


$admin = new Admin();
$admin->firstName = 'Aaron';
$admin->lastName =  'Mkandawire';
$admin->email = 'aaron@gmail.com';
$admin->gender = 'male';
$admin->adminRole = 'super';
$admin->password = '123456789';

$adminModel = new AdminModel();
$adminModel->add($admin);


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

(new StudentModel())->add($s);
