<?php

	require "../bootstrap.php";
	use Illuminate\Database\Capsule\Manager as Capsule;

	Capsule::schema()->create('boards', function ($table) {
	       $table->increments('id');
	       $table->string('name');
	   });

	Capsule::schema()->create('students', function ($table) {

       $table->increments('id');
	   $table->integer('board_id')->unsigned();
	   $table->foreign('board_id')->references('id')->on('boards')->onDelete('cascade');
       $table->string('name');
   });

	Capsule::schema()->create('grades', function ($table) {
       $table->increments('id');
       $table->integer('student_id')->unsigned();
	   $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
       $table->string('grade');
   });