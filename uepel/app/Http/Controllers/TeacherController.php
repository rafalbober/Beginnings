<?php

namespace App\Http\Controllers;
use App\Subject;
use App\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:teacher');
    }

    public function index()
    {
        return view('teacher');
    }


}
