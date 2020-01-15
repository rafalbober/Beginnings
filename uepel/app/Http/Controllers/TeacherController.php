<?php

namespace App\Http\Controllers;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class TeacherController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        $teacher = Teacher::find(Auth::id());
        return view('teacher', ['teacher' => $teacher]);
    }


}
