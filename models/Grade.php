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

   protected $hidden = ['id', 'student_id', 'created_at', 'updated_at'];

   /*
   * Get Gradess of Student
   *
   */

   public function student()

   {
       return $this->belongsTo('Student');

   }

 }