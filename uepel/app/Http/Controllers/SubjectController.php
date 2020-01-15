<?php

namespace App\Http\Controllers;
use App\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        $subjects = Subject::all();
        return view('subjects.index');
    }


    public function create()
    {
        return view('subjects.create');
    }

    public function store()
    {
//        $request->validate([
//
//            'name' => 'required',
//            'signup_capacity' => 'required'
//
//        ]);

//
//        $Subject= new Subject();
//
//        $Subject->__set('name', $request->input('name'));
//        $Subject->__set('signup_capacity', $request->input('signup_capacity'));
//        $Subject->__set('teacher id', 23);
//        $Subject->save();
//
//        return view('teacher');
        dd(request()->all());

    }
}
