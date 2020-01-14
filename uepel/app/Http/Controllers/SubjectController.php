<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SubjectController extends Controller
{

    public function index()
    {
        return view('subjects.index');
    }


    public function create()
    {
        return view('subjects.create');
    }
}
