<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Lesson;
use App\Student;
use Illuminate\Http\Request;
use App\Student_list;

class DegreeController extends Controller
{
    public function create($list)
    {

        $lesson = Lesson::all();
        $list = Student_list::findOrFail($list);
        foreach ($lesson as $lessons){
            if($lessons->subject_id == $list->subject_id){
                $degree = new Degree();

                $degree->__set('student_index',$list->index);
                $degree->__set('lesson_number',$lessons->id);
                $degree->__set('subject_id',$list->subject_id);
                $degree->save();

            }
        }
        $degree = new Degree();

        $degree->__set('student_index',$list->index);
        $degree->__set('subject_id',$list->subject_id);
        $degree->save();
    }

    public function newLesson($lesson)
    {
        $lesson = Lesson::findOrFail($lesson);
        $list = Student_list::all();
        foreach ($list as $lists)
        {
            if($lesson->subject_id == $lists->subject_id)
            {
                $degree = new Degree();

                $degree->__set('student_index',$lists->index);
                $degree->__set('lesson_number',$lesson->id);
                $degree->__set('subject_id',$lists->subject_id);
                $degree->save();
            }
        }
    }

    public function addDegreeLesson($index)
    {
        $degree = Degree::findOrFail($index);

        $data =request()->validate([
            'degree' => 'required',
        ]);


        $degree->__set('degree',request()->input('degree'));
        $degree->update();

        return redirect( '/lessons/show/'.$degree->lesson_number);

    }

    public function addDegreeSubject()
    {
        $degree = Degree::all();

        foreach ($degree as $degrees)
        {
            if($degrees->student_index == request()->input('student_id') && $degrees->subject_id == request()->input('subject_id') && is_null($degrees->lesson_number))
            {
                $degrees->__set('degree',request()->input('degree'));
                $degrees->update();
            }
        }


    }
   //
}
