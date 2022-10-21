<?php

include_once __DIR__ . '/Database.php';

class Authentication
{
  private Database $db;
  public function __construct()
  {
    $this->db = new Database();
  }

  public function loginStudent(string $email, string $password): bool
  {
    $sql = "select password from students where email = '$email'";
    $result = $this->db->connect()->query($sql);

    foreach ($result as $r) {
      return password_verify($password, $r['password']);
    }
    return false;
  }

  public function loginAdmin(string $email, string $password): bool
  {
    $sql = "select password from administrators where email = '$email'";
    $result = $this->db->connect()->query($sql);

    foreach ($result as $r) {
      return password_verify($password, $r['password']);
    }

    return false;
  }

  public function startUserSession(string $email, string $userType): void
  {
    $_SESSION['is_logged_in'] = true;
    $_SESSION['user_type'] = $userType;
    $_SESSION['user_email'] = $email;
    $_SESSION['flashmessage'] = '';
  }
}
