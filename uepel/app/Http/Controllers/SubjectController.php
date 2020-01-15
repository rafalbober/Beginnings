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

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required',
            'signup_capacity' => 'required'

        ]);


        $Subject= new Subjects();

        $Subject->__set('name', $request->input('name'));
        $Subject->__set('signup_capacity', $request->input('signup_capacity'));
        $Subject->save();

        return redirect('Subjects/' . $Subject->__get('id'));
    }
}
