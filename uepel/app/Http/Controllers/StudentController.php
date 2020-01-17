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

    public function joinSubject($id) {
        $listRecord = new Student_list();
        $listRecord->index = Auth::id();
        $listRecord->subject_id = $id;
        $listRecord->__set('joined', false);
        $listRecord->save();

        return redirect('student/subjects');

    }

}
