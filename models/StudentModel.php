<?php

require_once 'Database.php';

class StudentModel
{
  private Database $db;
  private string $TABLE = 'students';

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add(Student $s): bool
  {
    $hashedPasssword = password_hash($s->password, PASSWORD_BCRYPT);

    $sql =
      "insert into $this->TABLE 
      (
        student_id,first_name,last_name,gender,
        nrc,residential_address,postal_address,
        program_of_study,email,password
      ) 
      values 
      (
        '$s->studentID', '$s->firstName', '$s->lastName', 
        '$s->gender', '$s->nrc', '$s->residentialAddress', 
        '$s->postalAddress', '$s->program', '$s->email', 
        '$hashedPasssword'
      )";

    try {
      $this->db->connect()->query($sql);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function find(string $email): Student | null
  {
    $sql = "select * from $this->TABLE where email = '$email'";
    $result = $this->db->connect()->query($sql);

    $s = new Student();

    foreach ($result as $r) {
      $s->studentID = $r['student_id'];
      $s->firstName = $r['first_name'];
      $s->lastName = $r['last_name'];
      $s->gender = $r['gender'];
      $s->residentialAddress = $r['residential_address'];
      $s->postalAddress = $r['postal_address'];
      $s->email = $r['email'];
      $s->password = $r['password'];
    }

    return $s;
  }

  public function edit(Student $s): bool
  {
    $sql = "
    update $this->TABLE 
    set 
      student_id = '$s->studentID',
      first_name = '$s->firstName',
      last_name = '$s->lastName',
      gender = '$s->gender',
      nrc = '$s->nrc',
      residential_address = '$s->residentialAddress',
      postal_address = '$s->postalAddress',
      program_of_study = '$s->program',
      email = '$s->email'
    where student_id = '$s->studentID' ";

    try {
      $this->db->connect()->query($sql);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }
}
