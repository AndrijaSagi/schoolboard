<?php

	require "../bootstrap.php";
	use Illuminate\Database\Capsule\Manager as Capsule;

	Capsule::schema()->create('grades', function ($table) {
	       $table->increments('id');
	       $table->integer('student_id')->unsigned();
		   $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
	       $table->string('grade');
	       $table->timestamps();
	   });