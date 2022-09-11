<?php

include_once 'models/Database.php';

$db = new Database();

var_dump($db->connect()->query('select * from student'));
