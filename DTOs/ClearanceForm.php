<?php

class ClearanceForm
{
  public function __construct(
    public int $formID,
    public string $studentID,
    public string $studentName,
    public string $yearOfStudy,
    public string $roomNo,
    public string $term,

    public string $hodName,
    public string $hodApprovalStatus,
    public string $hodApprovalDate,

    public string $hostelRepName,
    public string $hsotelRepApprovalStatus,
    public string $hostelItemsDue,
    public string $hostelRepApprovalDate,

    public string $librarianName,
    public string $librarianApprovalStatus,
    public string $libraryItemsDue,
    public string $librarianApprovalDate,

    public string $accountantName,
    public string $accountantApprovalStatus,
    public float $accountsRunningBalance,
    public string $accountantApprovalDate,
  ) {
  }
}
