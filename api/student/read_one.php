<?php 
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require '../../bootstrap.php';
	require '../../models/Student.php';


	$id = $_GET['student'];

	// Get Student by id
	$student = new Student();
	//echo $student->getStudentWithGrades($id);
	echo $student->response($id);