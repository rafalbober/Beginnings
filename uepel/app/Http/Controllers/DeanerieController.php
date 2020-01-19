<?php

namespace App\Http\Controllers;
use App\Deanery;
use App\Teacher;
use App\Student;
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
        $teacher = Teacher::all();
        return view('deaneries.teacher_index', ['teacher'=>$teacher]);
    }

    public function showTeacher($index)
    {
        $teacher = Teacher::findOrFail($index);
        return view('deaneries.teacher_show',['teacher'=>$teacher]);
    }

    public function createTeacher()
    {
        $teacher = Teacher::all();
        return view('deaneries.teacher_create', ['teacher'=>$teacher]);
    }

    public function storeTeacher()
    {
        $data =request()->validate([
            'email' => ['required', 'unique:teachers,email'],
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required'

        ]);

        $Teacher = new Teacher();

        $Teacher->__set('name', $data['name']);
        $Teacher->__set('email',$data['email']);
        $Teacher->__set('surname', $data['surname']);
        $Teacher->__set('password', bcrypt($data['password']));
        //$Teacher->__set('Teacher_id', Auth::id());

        $Teacher->save();

        //auth()->user()->Teachers()->create($data);

        //\App\Teacher::create($data);
        return $this->indexTeacher();
    }

    public function indexStudent()
    {
        $student = Student::all();
        return view('deaneries.student_index', ['student'=>$student]);
    }

    public function createStudent()
    {
        $student = Student::all();
        return view('deaneries.student_create', ['student'=>$student]);
    }

    public function showStudent($index)
    {
        $student = Student::findOrFail($index);
        return view('deaneries.student_show',['student'=>$student]);
    }

    public function storeStudent()
    {
        $data =request()->validate([
            'email' => ['required','unique:students,email'],
            'name' => 'required',
            'surname' => 'required',
            'password' => 'required'

        ]);

        $Student = new Student();

        $Student->__set('name', $data['name']);
        $Student->__set('email',$data['email']);
        $Student->__set('surname', $data['surname']);
        $Student->__set('password', bcrypt($data['password']));
        //$Student->__set('Student_id', Auth::id());

        $Student->save();

        //auth()->user()->Students()->create($data);

        //\App\Student::create($data);
        return $this->indexStudent();
    }

    public function resetStudentPass($id, Request $request)
    {
        $Student = Student::findOrFail($id);
        $new = $request->input('new');
        $Student->__set('password', bcrypt($new));
        $Student->update();
        return redirect('/deaneries/student_index');
    }

    public function resetTeacherPass($id, Request $request)
    {
        $Teacher = Teacher::findOrFail($id);
        $new = $request->input('new');
        $Teacher->__set('password', bcrypt($new));
        $Teacher->update();
        return redirect('/deaneries/teacher_index');
    }
}
