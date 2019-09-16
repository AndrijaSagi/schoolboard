<?php

require "../bootstrap.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('students', function ($table) {

       $table->increments('id');
       $table->string('name');
       $table->timestamps();
   });
