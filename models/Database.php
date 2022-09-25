<?php

class Database
{
  public function __construct()
  {
    $this->conn = new mysqli('localhost', 'root', '', 'student_clearing_system');
  }
  public function __destruct()
  {
    $this->conn->close();
  }
  public function connect()
  {
    return $this->conn;
  }
}
