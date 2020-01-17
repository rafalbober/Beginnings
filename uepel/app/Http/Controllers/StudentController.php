<?php

namespace App\Http\Controllers;

use App\Subject;


class StudentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:student');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('students.home');
    }

    public function showSubjects()
    {
        $subjects = Subject::all();
        return view('students.subjects', ['subjects' => $subjects]);

    }
}
