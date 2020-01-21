<?php

namespace App\Http\Controllers;

use App\Presence;
use App\Student;
use App\Student_list;
use App\Subject;
use App\Teacher;
use App\Degree;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{

    public function index($teacher)
    {

        $teacher = Teacher::findOrFail($teacher);
        if( $teacher->id != Auth::user()->id )
            return redirect('/teachers/home');
        return view('subjects.index' , ['teacher' => $teacher]);
    }


    public function create()
    {
        return view('subjects.create');
    }

    public function show($index)
    {
        $subject = Subject::findOrFail($index);
        if( $subject->teacher_id != Auth::user()->id )
            return redirect('/teachers/home');
        return view('subjects.show',  ['subject' => $subject]);
    }

    public function edit($index)
    {
        $subject = Subject::findOrFail($index);
        if( $subject->teacher_id != Auth::user()->id )
            return redirect('/teachers/home');
        return view('subjects.edit',['subject' => $subject]);
    }

    public function update($index)
    {
        $subject = Subject::findOrFail($index);
        if( $subject->teacher_id != Auth::user()->id )
            return redirect('/teachers/home');
        $data =request()->validate([
            'description' => '',
            'name' => 'required',
            'capacity' => ['required','integer','min:1','gte:current'],
            'current' => ''
        ]);


        $subject->__set('name', $data['name']);
        $subject->__set('description',$data['description']);
        $subject->__set('signup_capacity', $data['capacity']);
        $subject->update();

        return redirect('/subjects/show/'.Auth::id());
    }

    public function store()
    {
        $data =request()->validate([
            'description' => '',
            'name' => 'required',
            'capacity' => ['required','integer','min:1']

        ]);

        $Subject = new Subject();

        $Subject->__set('name', $data['name']);
        $Subject->__set('description',$data['description']);
        $Subject->__set('signup_capacity', $data['capacity']);
        $Subject->__set('teacher_id', Auth::id());

        $Subject->save();

        //auth()->user()->subjects()->create($data);

        //\App\Subject::create($data);
        return redirect('/teachers/home');
    }

    public function showStudent($index)
    {
        $student = Student::findOrFail($index);
        $subject = Subject::findOrFail(request()->input('subject'));
        $subjectDegree = Degree::findOrFail(request()->input('degree'));

        if( $subject->teacher_id != Auth::user()->id )
            return redirect('/teachers/home');


        return view('subjects.student_details',  ['subject' => $subject, 'student'=>$student, 'subjectDegree'=>$subjectDegree]);
    }

    public function delete($index)
    {
        $subject = Subject::findOrFail($index);
        if( $subject->teacher_id != Auth::user()->id )
            return redirect('/teachers/home');

        $this->deleteAllDependences($index);

        $subject->delete();

        return redirect('/subjects/'.Auth::id());
    }

    public function deleteAllDependences($index)
    {
        $subject = Subject::findOrFail($index);
        if( $subject->teacher_id != Auth::user()->id )
            return redirect('/teachers/home');
        foreach ($subject->lesson as $value) {
            $degree = Degree::all();
            $presence = Presence::all();
            foreach ($degree as $degrees){
                if($degrees->lesson_number == $value->id){
                    $degrees->delete();
                }
                if($degrees->subject_id == $subject->id && is_null($degrees->lesson_number)){
                    $degrees->delete();
                }
            }
            foreach ($presence as $presences){
                if($presences->lesson_number == $value->id){
                    $presences->delete();
                }
            }
            $value->delete();
        }
        $list = Student_list::all();
        foreach ($list as $lists){
            if($lists->subject_id == $subject->id)
            {
                $lists->delete();
            }

        }
    }
}
