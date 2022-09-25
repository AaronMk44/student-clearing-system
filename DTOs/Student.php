<?php

class Student
{
  public function __construct(
    public string $studentID = '',
    public string $firstName = '',
    public string $lastName = '',
    public string $gender = '',
    public string $nrc = '',
    public string $residentialAddress = '',
    public string $postalAddress = '',
    public string $program = '',
    public string $email = '',
    public string $password = '',
  ) {
  }
}
