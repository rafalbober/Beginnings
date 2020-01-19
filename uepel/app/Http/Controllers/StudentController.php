<?php

namespace App\Http\Controllers;

use App\Student;
use App\Student_list;
use App\Subject;
use App\Teacher;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


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

    public function index($index)
    {
        $student = Student::findOrFail($index);
        return view('students.index',['student'=>$student]);
    }

    public function edit($index)
    {
        $student = Student::findOrFail($index);
        return view('students.edit',['student' => $student]);
    }

    public function joinSubject($id) {
        $listRecord = new Student_list();
        $listRecord->index = Auth::id();
        $listRecord->subject_id = $id;
        //$listRecord->__set('joined', false);
        $listRecord->save();

        return redirect('student/subjects_show');

    }

    public function update($index)
    {
        $student = Student::findOrFail($index);


        $validator = Validator::make(request()->all(), [
            'new'=>'required|same:repeat',
            'current'=>'required'
        ]);

        if(!Hash::check(request()->input('current'),$student->password))
        {
            $validator->after(function($validator) {
                $validator->errors()->add('current', 'Old Password wrong.');
            });
        }

        if ($validator->fails()) {
            return redirect('students/edit/'.$student->id)
                ->withErrors($validator)
                ->withInput();
        }


        $student->__set('password', bcrypt(request()->input('new')));

        $student->update();

        return redirect('/students/index/'.Auth::id());
    }

}
