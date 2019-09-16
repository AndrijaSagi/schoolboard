<?php

use Illuminate\Database\Eloquent\Model as Eloquent;

class Board extends Eloquent

{

   /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

   protected $fillable = [
       'name'
   ];

   /*
   * Get Gradess of Student
   *
   */

   public function students()

   {
       return $this->hasMany('Student');

   }

   public function csmStatus($average)

   {
      if ($average >= 7 )
      {
        return 'Pass';
      }

      return 'Fail';
   }

   public function csmbStatus($highestGrade)

   {
      if ($highestGrade > 8)
      {
        return 'Pass';
      }

      return 'Fail';
   }
}