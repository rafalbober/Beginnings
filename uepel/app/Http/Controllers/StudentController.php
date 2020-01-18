<?php

namespace App\Http\Controllers;

use App\Student;
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
    public function home()
    {
        $student = Student::findOrFail(Auth::id());
        return view('students.home',['student'=>$student]);
    }

    public function showSubjects()
    {
        $subjects = Subject::all();
        $list = Student_list::all();
        return view('students.subjects_show', ['subjects' => $subjects], ['list' => $list]);

    }

    public function showMySubjects()
    {
        $subjects = Subject::all();
        $list = Student_list::all();
        return view('students.my_subjects', ['subjects' => $subjects], ['list' => $list]);

    }

    public function index($index)
    {
        $student = Student::findOrFail($index);
        return view('students.index',['student'=>$student]);
    }

    public function joinSubject($id) {
        $listRecord = new Student_list();
        $listRecord->index = Auth::id();
        $listRecord->subject_id = $id;
        //$listRecord->__set('joined', false);
        $listRecord->save();

        return redirect('student/subjects_show');

    }

}
