<?php

namespace App\Http\Controllers;
use App\Subject;
use App\Teacher;
use App\Student_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function home()
    {
        $teacher = Teacher::findOrFail(Auth::id());
        return view('teachers.home', ['teacher' => $teacher]);
    }

    public function index($index)
    {
        $teacher = Teacher::findOrFail($index);
        return view('teachers.index', ['teacher' => $teacher]);
    }

    public function request($index)
    {
        $subject = Subject::findOrFail($index);
        $list = Student_list::all();
        return view('teachers.request', ['subject' => $subject],['list'=>$list]);
    }


}
