<?php

namespace App\Http\Controllers;

use App\Student_list;
use App\Subject;
use Illuminate\Support\Facades\Auth;


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

    public function joinSubject($subject) {
        $list = new Student_list();
        $list->index = Auth::id();
        $list->subject_id = $subject->id;
        $list->save();

        return view('student.subjects');

    }

}
