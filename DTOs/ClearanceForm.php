<?php

class ClearanceForm
{
  public function __construct(
    public int $formID = 0,
    public string $studentID = '',
    public string $studentName = '',
    public string $yearOfStudy = '',
    public string $roomNo = '',
    public string $term = '',

    public string $hodName = '',
    public string $hodApprovalStatus = 'pending',
    public string $hodApprovalDate = '',

    public string $hostelRepName = '',
    public string $hostelRepApprovalStatus = 'pending',
    public string $hostelItemsDue = '',
    public string $hostelRepApprovalDate = '',

    public string $librarianName = '',
    public string $librarianApprovalStatus = 'pending',
    public string $libraryItemsDue = '',
    public string $librarianApprovalDate = '',

    public string $accountantName = '',
    public string $accountantApprovalStatus = 'pending',
    public float $accountsRunningBalance = 0.0,
    public string $accountantApprovalDate = ''
  ) {
  }
}
