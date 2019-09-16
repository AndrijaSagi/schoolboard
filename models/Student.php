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

   /*
   * Student has Grades
   *
   */

   public function grades()

   {
       return $this->hasMany('Grade');

   }

   /*
   * Student belongs to Board
   *
   */
   public function board()

   {
       return $this->belongsTo('Board');

   }

   public function getStudentById($id)

   {
       return $this->find($id);
   }

   public function calculateAverageGrade($user)

   {
      $grades =  $user->grades->pluck('grade');
      return round($grades->avg());
   }

   public function csmbCalculate($user)
   {
      $grades = $user->grades->pluck('grade');
      if($grades->count() > 2)
      {
        $lowestGrade = $user->grades->pluck('grade')->min();
        $filteredGrades = $grades->filter(function ($value, $key) use ($lowestGrade) {
            return $value > $lowestGrade;
        });
        $highestGrade = $filteredGrades->max();
      }
      $highestGrade = $grades->max();
      return $user->board->csmbStatus($highestGrade);
   }

  public function response($user, $status, $average)
  {
      return collect(['id' => $user->id, 'name' => $user->name, 'grades' => $user->grades, 'average' => $average, 'status' => $status]);
  }

  public function getStudent($id)

   {
      $user = $this->getStudentById($id);
      $average = $this->calculateAverageGrade($user);
      if($user->board->name == 'CSM')
      {
        $status = $user->board->csmStatus($average); 
        return $this->response($user, $status, $average);
      }
      $status = $this->csmbCalculate($user);
      return $this->response($user, $status, $average);
   }

 }
