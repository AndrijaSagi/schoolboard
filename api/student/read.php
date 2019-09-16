<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  require '../../bootstrap.php';
  require '../../models/Student.php';


  // Get all Students
  $student = new Student();
  echo $student->getStudents();
