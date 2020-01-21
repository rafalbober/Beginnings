@extends('layouts.app')

@section('content')


    <div class="container mb-5">
        <div>
            <div class="col-md-6">
                <h2>{{ $subject->name }} ({{ $subject->signup_capacity }})</h2>
                <a href="{{route('subject.edit',$subject)}}">edit subject</a>
                <p>{{ $subject->description }}</p>
                <a class="btn btm-md " style="background-color: #D3D3D3;  " href={{route('lesson.create',$subject->id)}}>Create new lesson</a>
            </div>
            </div>
            <div class="row" style=" margin-right: 10% ">
                 @foreach ($subject->lesson as $lesson)
                     <div class="media" style="padding-top: 2%;padding-bottom: 2% ">
                         <div class="media-body" >
                             <div class="card" style="margin-top: 3%">
                                <div class="media" >
                                 <img src="{{URL::asset('/images/subject.jpg')}}" width="30%"  >
                                 <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%">
                                    <h2>{{ $lesson->title }}</h2>
                                    <p>{{ $lesson->description }} </p>
                                    <a class="btn btm-md " style="background-color: #D3D3D3;"href={{route("lesson.show",$lesson->id)}}> details</a>
                                 </div>
                                </div>
                             </div>
                        </div>
                     </div>
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

                <?php

                }

            }
        }
        ?>
        </div>

    </li>
</div>
@endsection
