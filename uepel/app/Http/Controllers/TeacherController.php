<?php

namespace App\Http\Controllers;
use App\Subject;
use App\Teacher;
use App\Student_list;
use App\Degree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\MessageBag;
use Illuminate\Validation\Rule;

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
        (new DegreeController)->create($list->id);
        (new PresenceController)->create($list->id);
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


        $validator = Validator::make(request()->all(), [
            'new'=>'required|same:repeat',
            'current'=>'required'
        ]);

        if(!Hash::check(request()->input('current'),$teacher->password))
        {
            $validator->after(function($validator) {
                $validator->errors()->add('current', 'Old Password wrong.');
            });
        }

        if ($validator->fails()) {
            return redirect('teachers/edit/'.$teacher->id)
                ->withErrors($validator)
                ->withInput();
        }


        $teacher->__set('password', bcrypt(request()->input('new')));

        $teacher->update();

        return redirect('/teachers/index/'.Auth::id());
    }

    public function addDegreeLesson($index)
    {

    }




}
