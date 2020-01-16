<?php

namespace App\Http\Controllers;
use App\Deanery;
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
        return view('deaneries.teacher_index');
    }

    public function indexStudent()
    {
        return view('deaneries.student_index');
    }
}
