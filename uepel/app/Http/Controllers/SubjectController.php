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
}
