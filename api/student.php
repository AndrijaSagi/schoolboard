<?php 
	// Headers
	header('Access-Control-Allow-Origin: *');
	header('Content-Type: application/json');

	require '../bootstrap.php';
	require '../models/Student.php';

	// Get id from request
	$id = $_GET['student'];

	// Get response
	$student = new Student();
	echo $student->getStudent($id);