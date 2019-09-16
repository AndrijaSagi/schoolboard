<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Student extends Eloquent

{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $fillable = [
       'name'
   ];

  protected $with = ['grades'];

   /*
   * Get Gradess of Student
   *
   */

   public function grades()

   {
       return $this->hasMany('Grade');

   }

   /*
   * Get all Students
   *
   */

   public function getStudents()

   {
       return $this->get();

   }

   public function getStudentWithGrades()

   {
       return $this->find(1);

   }

 }