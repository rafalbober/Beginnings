<?php

namespace App\Http\Controllers;

use App\Lesson;
use App\Degree;
use App\Http\Controllers\DegreeController;
use App\Presence;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function index($subject)
    {

        $subject = Teacher::findOrFail($subject);
        return view('lessons.index' , ['teacher' => $subject]);
    }

    public function show($index)
    {
        $lesson = Lesson::findOrFail($index);
        return view('lessons.show',  ['lesson' => $lesson]);
    }

    public function create($index)
    {

        return view('lessons.create',['index'=>$index]);
    }

    public function edit($index)
    {
        $lesson = Lesson::findOrFail($index);
        return view('lessons.edit',['lesson' => $lesson]);
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

        //Degree::newLesson($Lesson->id);



        $Lesson->save();
        (new DegreeController)->newLesson($Lesson->id);
        (new PresenceController())->newLesson($Lesson->id);

        //auth()->user()->subjects()->create($data);

        //\App\Subject::create($data);
        return redirect('/subjects/show/'.$data['id']);
    }

    public function update($index)
    {
        $lesson = Lesson::findOrFail($index);
        $data =request()->validate([
            'description' => '',
            'title' => 'required'


        ]);


        $lesson->__set('title', $data['title']);
        $lesson->__set('description',$data['description']);
        $lesson->update();

        return redirect('/lessons/show/'.$index);
    }

    public function delete($index)
    {

        $lesson = Lesson::findOrFail($index);
        $this->deletePresenceDegree($index);
        $index = $lesson->subject->id;

        $lesson->delete();


        return redirect('/subjects/show/'.$index);
    }

    public function deletePresenceDegree($index)
    {
        $lesson = Lesson::findOrFail($index);

        $degree = Degree::all();
        foreach ($degree as $degrees){
            if($degrees->lesson_number == $lesson->id){
                $degrees->delete();
            }
        }
        $presence = Presence::all();
        foreach ($presence as $presences){
            if($presences->lesson_number == $lesson->id){
                $presences->delete();
            }
        }
    }
}
