<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educational_qualification extends Model
{
    use HasFactory;

    function RelationWithExam(){
        return $this->hasOne('App\Models\Examination_name', 'id', 'exam_id');
    }
    function RelationWithVersity(){
        return $this->hasOne('App\Models\University', 'id', 'university_id');
    }
    function RelationWithBoard(){
        return $this->hasOne('App\Models\Board', 'id', 'board_id');
    }
}
