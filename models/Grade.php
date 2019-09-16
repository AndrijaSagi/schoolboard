<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Grade extends Eloquent

{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $fillable = [

       'student_id', 'grade'

   ];

   /*
   * Get Gradess of Student
   *
   */

   public function student()

   {
       return $this->belongsTo('Student');

   }

 }