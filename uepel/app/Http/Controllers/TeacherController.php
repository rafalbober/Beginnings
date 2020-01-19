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

    public function edit($index)
    {
        $teacher = Teacher::findOrFail($index);
        return view('teachers.edit',['teacher' => $teacher]);
    }



    public function request($index)
    {
        $subject = Subject::findOrFail($index);
        $list = Student_list::all();
        return view('teachers.request', ['subject' => $subject],['list'=>$list]);
    }
    public function requestAccept($index)
    {
        $list = Student_list::findOrFail($index);
        $subject = Subject::findOrFail($list->subject_id);
        $list->__set('joined', 1);
        $helper = $subject->signup_current + 1;
        $subject->__set('signup_current', $helper);
        $list->save();
        $list = Student_list::all();
        return view('teachers.request', ['subject' => $subject],['list'=>$list]);
    }
    public function requestReject($index)
    {
        $list = Student_list::findOrFail($index);
        $subject = Subject::findOrFail($list->subject_id);
        $list->__set('joined', 0);
        $list->save();
        $list = Student_list::all();
        return view('teachers.request', ['subject' => $subject],['list'=>$list]);
    }

    public function update($index)
    {
        $teacher = Teacher::findOrFail($index);


        $data =request()->validate([
            'new'=>'required|same:repeat',
            'previous'=>'same:'.$teacher->password
        ]);




        $teacher->__set('password', bcrypt($data['new']));

        $teacher->update();

        return redirect('/teachers/index/'.Auth::id());
    }




}
