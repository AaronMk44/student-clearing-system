<?php


class Admin
{
  public function __construct(
    public int $adminID = 0,
    public string $firstName = '',
    public string $lastName = '',
    public string $gender = '',
    public string $adminRole = '',
    public string $email = '',
    public string $password = ''
  ) {
  }
}
