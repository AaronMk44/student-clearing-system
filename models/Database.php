<?php

class Database
{
  public function __construct()
  {
    $this->conn = new mysqli('localhost', 'root', '', 'clearing_db');
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
