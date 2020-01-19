<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Presence;
use App\Student_list;
use Illuminate\Http\Request;

class PresenceController extends Controller
{
    public function create($list)
    {

        $lesson = Lesson::all();
        $list = Student_list::findOrFail($list);
        foreach ($lesson as $lessons){
            if($lessons->subject_id == $list->subject_id){
                $presence = new Presence();

                $presence->__set('student_index',$list->index);
                $presence->__set('lesson_number',$lessons->id);
                $presence->__set('subject_id',$list->subject_id);
                $presence->save();

            }
        }
    }

    public function newLesson($lesson)
    {
        $lesson = Lesson::findOrFail($lesson);
        $list = Student_list::all();
        foreach ($list as $lists)
        {
            if($lesson->subject_id == $lists->subject_id)
            {
                $presence = new Presence();

                $presence->__set('student_index',$lists->index);
                $presence->__set('lesson_number',$lesson->id);
                $presence->__set('subject_id',$lists->subject_id);
                $presence->save();
            }
        }
    }
}
