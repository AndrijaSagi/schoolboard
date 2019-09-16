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

   public function getStudentWithGrades($id)

   {
       return $this->find($id);
   }

   public function average($id)

   {
      return round($this->find($id)->grades->pluck('grade')->avg());
   }

   public function csmPass($average)

   {
      if ($average >= 7 )
      {
        return 'Pass';
      }

      return 'Fail';
   }

   public function csmbPass($id)

   {
      $grades = $this->find($id)->grades->pluck('grade');
      $lowestGrade = $this->find($id)->grades->pluck('grade')->min();
      $filtered = $grades->filter(function ($value, $key) use ($lowestGrade) {
          return $value > $lowestGrade;
      });
      $highestGrade = $filtered->max();
      return $highestGrade;
   }

  public function response($id)

   {
      $user = $this->findOrFail($id);
      $average = $this->average($id);
      $pass = $this->csmPass($average);
      $csmb = $this->csmbPass($id);
      return collect(['id' => $user->id, 'name' => $user->name, 'average' => $average, 'pass' => $pass, 'csmb' => $csmb]);
   }

 }
