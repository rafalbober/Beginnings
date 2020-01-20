@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row ">
            <div class="col-md-12">
                <div class="col-md-4">
                    <h2>{{ $subject->name }} ({{ $subject->signup_capacity }})</h2><a href="{{route('subject.edit',$subject)}}">edit</a>
                </div>
                <p>{{ $subject->description }}</p>

                <a href={{route('lesson.create',$subject->id)}}>Create new lesson</a>




                    @foreach ($subject->lesson as $lesson)
                        <li><strong>{{ $lesson->title }}</strong></li>
                        <a href={{route("lesson.show",$lesson->id)}}> details</a>
                    @endforeach




            </div>
        </div>
        <?php
        $Student = \App\Student::all();
        $Degree = \App\Degree::all();

        foreach($Student as $student){
        foreach ($Degree as $degree)
        {
        if($student->id == $degree->student_index && is_null($degree->lesson_number) && $degree->subject_id == $subject->id){
        $i = $student->id;
        ?>
        <li>
            <div>
            <div > <h2>{{$student->name}}
                    <form method="POST" action="{{route('subject.student_details',$degree->student_index)}}">
                        @csrf
                        <input type = "hidden" name = "subject" value ="{{$degree->subject_id}}">
                        <input type = "hidden" name = "degree" value ="{{$degree->id}}">
                        <button type="submit">Student details</button></form>
                </h2>
            </div>
                Degree:
                @if(is_null($degree->degree))
                    No Degree
                @else
                    {{$degree->degree}}
                @endif

                <?php

                }

            }
        }
        ?>
        </div>

    </li>
</div>
@endsection
