<?php

namespace App\Http\Controllers;

use App\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($subject)
    {

        $subject = Teacher::findOrFail($subject);
        return view('lessons.index' , ['teacher' => $subject]);
    }

    public function create($index)
    {

        return view('lessons.create',['index'=>$index]);
    }

    public function store()
    {
        $data =request()->validate([
            'description' => '',
            'title' => 'required',
            'id' => 'required'

        ]);

        $Lesson = new Lesson();

        $Lesson->__set('title', $data['title']);
        $Lesson->__set('description',$data['description']);
        $Lesson->__set('subject_id', $data['id']);

        $Lesson->save();

        //auth()->user()->subjects()->create($data);

        //\App\Subject::create($data);
        return redirect('/subjects/show/'.$data['id']);
    }
}
