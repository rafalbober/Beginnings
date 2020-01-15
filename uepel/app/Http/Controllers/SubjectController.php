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
        $data =request()->validate([
            'description' => '',
            'name' => 'required',
            'capacity' => ['required','integer']

        ]);

        $Subject = new Subject();
        $Subject->name = $data['name'];
        $Subject->description = $data['description'];
        $Subject->signup_capacity = $data['capacity'];
        $Subject->teacher_id = 23;
        $Subject->save();

        //auth()->user()->subjects()->create($data);

        //\App\Subject::create($data);
    }
}
