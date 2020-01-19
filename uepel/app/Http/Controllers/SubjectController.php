<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Teacher;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{

    public function index($teacher)
    {

        $teacher = Teacher::findOrFail($teacher);
        return view('subjects.index' , ['teacher' => $teacher]);
    }


    public function create()
    {
        return view('subjects.create');
    }

    public function show($index)
    {
        $subject = Subject::findOrFail($index);
        return view('subjects.show',  ['subject' => $subject]);
    }

    public function edit($index)
    {
        $subject = Subject::findOrFail($index);
        return view('subjects.edit',['subject' => $subject]);
    }

    public function update($index)
    {
        $subject = Subject::findOrFail($index);
        $data =request()->validate([
            'description' => '',
            'name' => 'required',
            'capacity' => ['required','integer']
        ]);


        $subject->__set('name', $data['name']);
        $subject->__set('description',$data['description']);
        $subject->__set('signup_capacity', $data['capacity']);
        $subject->update();

        return redirect('/subjects/show/'.Auth::id());
    }

    public function store()
    {
        $data =request()->validate([
            'description' => '',
            'name' => 'required',
            'capacity' => ['required','integer']

        ]);

        $Subject = new Subject();

        $Subject->__set('name', $data['name']);
        $Subject->__set('description',$data['description']);
        $Subject->__set('signup_capacity', $data['capacity']);
        $Subject->__set('teacher_id', Auth::id());

        $Subject->save();

        //auth()->user()->subjects()->create($data);

        //\App\Subject::create($data);
        return redirect('/subjects/'.Auth::id());
    }

    public function delete($index)
    {
        $subject = Subject::findOrFail($index);
        foreach ($subject->lesson as $value) {
            $value->delete();
        }


        $subject->delete();

        return redirect('/subjects/'.Auth::id());
    }
}
