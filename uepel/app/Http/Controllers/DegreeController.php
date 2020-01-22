<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Lesson;
use App\Student;
use App\Subject;
use Illuminate\Http\Request;
use App\Student_list;
use Illuminate\Support\Facades\Auth;

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

        $subject = Subject::findOrFail($degree->subject_id);
        $student = Student::findOrFail($degree->student_index);
        $subjectDegree = 0;
        foreach($student->degree as $degrees)
        {
            if($degrees->subject_id == $degree->subject_id && is_null($degrees->lesson_number))
            {
                $subjectDegree = Degree::findOrFail($degrees->id);
                break;
            }

        }


        return view('subjects.student_details',  ['subject' => $subject, 'student'=>$student, 'subjectDegree'=>$subjectDegree]);

    }

    public function addDegreeSubject($index)
    {
        $degree = Degree::findOrFail($index);

        $data =request()->validate([
            'degree' => 'required',
        ]);


        $degree->__set('degree',request()->input('degree'));
        $degree->update();

        $subject = Subject::findOrFail($degree->subject_id);
        $student = Student::findOrFail($degree->student_index);

        return view('subjects.student_details',  ['subject' => $subject, 'student'=>$student, 'subjectDegree'=>$degree]);

    }

    public function showDegree($index)
    {
        $degree = Degree::all();
        $deg = 0;
        foreach($degree as $degrees)
        {
            if($degrees->subject_id == $index && $degrees->student_index == Auth::id() && is_null($degrees->lesson_number))
            {
                $deg = $degrees->degree;
            }
        }

        return $deg;
    }

    public function showLessonDegree($index, $lesson)
    {
        $degree = Degree::all();
        $deg = 0;
        foreach($degree as $degrees)
        {
            if($degrees->subject_id == $index && $degrees->lesson_number == $lesson && $degrees->student_index == Auth::id())
            {
                $deg = $degrees->degree;
            }
        }
        return $deg;
    }
   //
}
