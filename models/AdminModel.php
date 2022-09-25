<?php

require_once 'Database.php';

class AdminModel
{
  private Database $db;
  private string $TABLE = 'administrators';

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add(Admin $a): bool
  {
    $hashedPasssword = password_hash($a->password, PASSWORD_BCRYPT);

    $sql =
      "insert into $this->TABLE 
      (
        first_name,last_name,gender,
        admin_role,email,password
      ) 
      values 
      (
        '$a->firstName', '$a->lastName', '$a->gender','$a->adminRole',
        '$a->email', '$hashedPasssword'
      )";

    try {
      $this->db->connect()->query($sql);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function find(string $email): Admin | null
  {
    $sql = "select * from $this->TABLE where email = '$email'";
    $result = $this->db->connect()->query($sql);

    $a = new Admin();

    foreach ($result as $r) {
      $a->adminID = $r['admin_id'];
      $a->firstName = $r['first_name'];
      $a->lastName = $r['last_name'];
      $a->gender = $r['gender'];
      $a->adminRole = $r['admin_role'];
      $a->email = $r['email'];
      $a->password = $r['password'];
    }

    return $a;
  }

  public function edit(Admin $a): bool
  {
    $sql = "
    update $this->TABLE 
    set 
      first_name = '$a->firstName',
      last_name = '$a->lastName',
      gender = '$a->gender',
      admin_role = '$a->adminRole',
      email = '$a->email'
    where admin_id = '$a->adminID' ";

    try {
      $this->db->connect()->query($sql);
      return true;
    } catch (\Throwable $th) {
      return false;
    }
  }

  public function getHODs(): array
  {
    $sql = "select * from $this->TABLE where admin_role = 'hod'";

    $result = $this->db->connect()->query($sql);
    $hods = [];

    foreach ($result as $r) {
      $a = new Admin();
      $a->adminID = $r['admin_id'];
      $a->firstName = $r['first_name'];
      $a->lastName = $r['last_name'];
      $a->gender = $r['gender'];
      $a->adminRole = $r['admin_role'];
      $a->email = $r['email'];

      $hods[] = $a;
    }

    return $hods;
  }
}
