<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeanerieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        return view('admin');
    }

    public function indexTeacher()
    {
        return view('deaneries.teacher.index');
    }

    public function indexStudent()
    {
        return view('deaneries.student.index');
    }
}
