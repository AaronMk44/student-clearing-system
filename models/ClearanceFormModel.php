<?php

require_once 'Database.php';

class ClearanceFormModel
{
  private Database $db;
  private string $TABLE = 'clearance_forms';

  public function __construct()
  {
    $this->db = new Database();
  }

  public function add(ClearanceForm $f): void
  {
    //student_id	student_name	student_year_of_study	student_room_no	clear_for_term	hostel_rep_name	hostel_rep_approval_status	hostel_items_due	hostel_rep_approval_date	hod_name	hod_approval_status	hod_approval_date	librarian_name	librarian_approval_status	library_items_due	librarian_approval_date	accountant_name	accountant_approval_status	accountant_approval_date	student_running_balance
    $sql =
      "insert into $this->TABLE
      (
        student_id,student_name,student_year_of_study,
        student_room_no,clear_for_term,hostel_rep_name,	
        hostel_rep_approval_status,hostel_items_due,	
        hostel_rep_approval_date,hod_name,hod_approval_status,	
        hod_approval_date,librarian_name,librarian_approval_status,	
        library_items_due,librarian_approval_date,	
        accountant_name,accountant_approval_status,	
        accountant_approval_date,student_running_balance
      )
      values
      (
        $f->studentID,'$f->studentName',$f->yearOfStudy,
        '$f->roomNo','$f->term','$f->hostelRepName',	
        '$f->hostelRepApprovalStatus','$f->hostelItemsDue',	
        '$f->hostelRepApprovalDate','$f->hodName','$f->hodApprovalStatus',	
        '$f->hodApprovalDate','$f->librarianName','$f->librarianApprovalStatus',	
        '$f->libraryItemsDue','$f->librarianApprovalDate',	
        '$f->accountantName','$f->accountantApprovalStatus',	
        '$f->accountantApprovalDate',$f->accountsRunningBalance
      )    
    ";

    $this->db->connect()->query($sql);
  }

  public function find(int $formID): ClearanceForm
  {
    $sql = "select * from $this->TABLE where form_id = $formID";
    $result = $this->db->connect()->query($sql);

    $f = new ClearanceForm();

    foreach ($result as $r) {

      $f->formID = $r['form_id'];
      $f->studentID = $r['student_id'];

      $f->yearOfStudy = $r['student_year_of_study'];
      $f->roomNo = $r['student_room_no'];
      $f->term = $r['clear_for_term'];

      $f->hodName = $r['hod_name'];
      $f->hodApprovalStatus = $r['hod_approval_status'];
      $f->hodApprovalDate = $r['hod_approval_date'];

      $f->hostelRepName = $r['hostel_rep_name'];
      $f->hostelRepApprovalStatus = $r['hostel_rep_approval_status'];
      $f->hostelItemsDue = $r['hostel_items_due'];
      $f->hostelRepApprovalDate = $r['hostel_rep_approval_date'];

      $f->librarianName = $r['librarian_name'];
      $f->librarianApprovalStatus = $r['librarian_approval_status'];
      $f->libraryItemsDue = $r['library_items_due'];
      $f->librarianApprovalDate = $r['librarian_approval_date'];

      $f->accountantName = $r['accountant_name'];
      $f->accountantApprovalStatus = $r['accountant_approval_status'];
      $f->accountsRunningBalance = $r['student_running_balance'];
      $f->accountantApprovalDate = $r['accountant_approval_date'];
    }

    return $f;
  }

  public function getFormsFor(int $studentID): array
  {
    $sql = "select * from $this->TABLE where student_id = $studentID";
    $result = $this->db->connect()->query($sql);

    $forms = [];

    foreach ($result as $r) {
      $f = new ClearanceForm();

      $f->formID = $r['form_id'];
      $f->studentID = $r['student_id'];

      $f->yearOfStudy = $r['student_year_of_study'];
      $f->roomNo = $r['student_room_no'];
      $f->term = $r['clear_for_term'];

      $f->hodName = $r['hod_name'];
      $f->hodApprovalStatus = $r['hod_approval_status'];
      $f->hodApprovalDate = $r['hod_approval_date'];

      $f->hostelRepName = $r['hostel_rep_name'];
      $f->hostelRepApprovalStatus = $r['hostel_rep_approval_status'];
      $f->hostelItemsDue = $r['hostel_items_due'];
      $f->hostelRepApprovalDate = $r['hostel_rep_approval_date'];

      $f->librarianName = $r['librarian_name'];
      $f->librarianApprovalStatus = $r['librarian_approval_status'];
      $f->libraryItemsDue = $r['library_items_due'];
      $f->librarianApprovalDate = $r['librarian_approval_date'];

      $f->accountantName = $r['accountant_name'];
      $f->accountantApprovalStatus = 'accountant_approval_status';
      $f->accountsRunningBalance = $r['student_running_balance'];
      $f->accountantApprovalDate = $r['accountant_approval_date'];

      $forms[] = $f;
    }

    return $forms;
  }

  public function getPendingFormsFor(int $studentID): array
  {
    $sql = "
    select * from $this->TABLE 
    where 
    student_id = $studentID and 
    (hod_approval_status != 'approved' or 
    hostel_rep_approval_status != 'approved' or 
    hostel_rep_approval_status != 'approved' or 
    librarian_approval_status != 'approved')";
    $result = $this->db->connect()->query($sql);

    $forms = [];

    foreach ($result as $r) {
      $f = new ClearanceForm();

      $f->formID = $r['form_id'];
      $f->studentID = $r['student_id'];

      $f->yearOfStudy = $r['student_year_of_study'];
      $f->roomNo = $r['student_room_no'];
      $f->term = $r['clear_for_term'];

      $f->hodName = $r['hod_name'];
      $f->hodApprovalStatus = $r['hod_approval_status'];
      $f->hodApprovalDate = $r['hod_approval_date'];

      $f->hostelRepName = $r['hostel_rep_name'];
      $f->hostelRepApprovalStatus = $r['hostel_rep_approval_status'];
      $f->hostelItemsDue = $r['hostel_items_due'];
      $f->hostelRepApprovalDate = $r['hostel_rep_approval_date'];

      $f->librarianName = $r['librarian_name'];
      $f->librarianApprovalStatus = $r['librarian_approval_status'];
      $f->libraryItemsDue = $r['library_items_due'];
      $f->librarianApprovalDate = $r['librarian_approval_date'];

      $f->accountantName = $r['accountant_name'];
      $f->accountantApprovalStatus = 'accountant_approval_status';
      $f->accountsRunningBalance = $r['student_running_balance'];
      $f->accountantApprovalDate = $r['accountant_approval_date'];

      $forms[] = $f;
    }

    return $forms;
  }

  public function getApprovedFormsFor(int $studentID): array
  {
    $sql = "
    select * from $this->TABLE 
    where 
    student_id = $studentID and 
    hod_approval_status = 'approved' and 
    hostel_rep_approval_status = 'approved' and 
    hostel_rep_approval_status = 'approved' and 
    librarian_approval_status = 'approved'";

    $result = $this->db->connect()->query($sql);

    $forms = [];

    foreach ($result as $r) {
      $f = new ClearanceForm();

      $f->formID = $r['form_id'];
      $f->studentID = $r['student_id'];

      $f->yearOfStudy = $r['student_year_of_study'];
      $f->roomNo = $r['student_room_no'];
      $f->term = $r['clear_for_term'];

      $f->hodName = $r['hod_name'];
      $f->hodApprovalStatus = $r['hod_approval_status'];
      $f->hodApprovalDate = $r['hod_approval_date'];

      $f->hostelRepName = $r['hostel_rep_name'];
      $f->hostelRepApprovalStatus = $r['hostel_rep_approval_status'];
      $f->hostelItemsDue = $r['hostel_items_due'];
      $f->hostelRepApprovalDate = $r['hostel_rep_approval_date'];

      $f->librarianName = $r['librarian_name'];
      $f->librarianApprovalStatus = $r['librarian_approval_status'];
      $f->libraryItemsDue = $r['library_items_due'];
      $f->librarianApprovalDate = $r['librarian_approval_date'];

      $f->accountantName = $r['accountant_name'];
      $f->accountantApprovalStatus = 'accountant_approval_status';
      $f->accountsRunningBalance = $r['student_running_balance'];
      $f->accountantApprovalDate = $r['accountant_approval_date'];

      $forms[] = $f;
    }

    return $forms;
  }
}
