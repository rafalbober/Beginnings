<?php

namespace App\Http\Controllers;

use App\Degree;
use App\Lesson;
use App\Presence;
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

    public function showMySubjects()
    {
        $subjects = Subject::all();
        $list = Student_list::all();
        return view('students.my_subjects', ['subjects' => $subjects], ['list' => $list]);

    }

    public function index($index)
    {
        $student = Student::findOrFail($index);
        return view('students.index',['student'=>$student]);
    }

    public function showLessons($id) {
        $subject = Subject::findOrFail($id);

        return view('students.lessons',  ['subject' => $subject]);
    }

    public function showLessonDetails($id) {
        $lesson = Lesson::findOrFail($id);

        return view('students.lessonDetails',  ['lesson' => $lesson]);
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

    public function subjectResign($index)
    {
        $student = Student::findOrFail(Auth::id());
        $degrees = Degree::all();
        $subject = Subject::findOrFail($index);
        foreach($degrees as $degree)
        {
            if($degree->subject_id ==$index && $degree->student_index == Auth::id()) {
                $degree->delete();
            }
        }

        $presences = Presence::all();
        foreach($presences as $presence)
        {
            if($presence->subject_id ==$index && $presence->student_indexc == Auth::id()) {
                $presence->delete();
            }
        }
        $lists = Student_list::all();
        foreach($lists as $list)
        {
            if($list->subject_id ==$index && $list->index == Auth::id()) {
                $list->__set('joined', 2);
                $list->update();
            }
        }

        $subject->__set('signup_current',($subject->signup_current - 1));
        $subject->update();
        $subjects = Subject::all();
        $list = Student_list::all();
        return view('students.my_subjects', ['subjects' => $subjects], ['list' => $list]);


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
