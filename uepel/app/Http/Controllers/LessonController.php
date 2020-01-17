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

    public function create()
    {
        return view('lessons.create');
    }

    public function store()
    {
        $data =request()->validate([
            'description' => '',
            'name' => 'required',
            'capacity' => ['required','integer']

        ]);

        $Lesson = new Lesson();

        $Lesson->__set('name', $data['name']);
        $Lesson->__set('description',$data['description']);
        $Lesson->__set('signup_capacity', $data['capacity']);
        $Lesson->__set('teacher_id', Auth::id());

        $Lesson->save();

        //auth()->user()->subjects()->create($data);

        //\App\Subject::create($data);
        return redirect('/subjects/'.Auth::id());
    }
}
