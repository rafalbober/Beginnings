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

        <script>
            function displayDegree(i) {
                let val = 'val' + i;
                let range = 'range' + i;
                document.getElementById(val).value = document.getElementById(range).value;
            }

            function showSlider(i) {
                let span = 'span' + i;
                let btn = 'showSlider' + i;
                document.getElementById(span).style.display = "block";
                document.getElementById(btn).style.display = "none";
            }

            function showCheck(i) {
                let span = 'szpan' + i;
                let btn = 'showCheck' + i;
                document.getElementById(span).style.display = "block";
                document.getElementById(btn).style.display = "none";
            }
        </script>
        <style>
            label, input, button, form {
                display: inline;
                margin: 5px;
            }
        </style>
        <?php
        $Student = \App\Student::all();
        $Degree = \App\Degree::all();

        foreach($Student as $student){
        foreach ($Degree as $degree)
        {
        if($student->id == $degree->student_index && is_null($degree->lesson_number)){
        $i = $student->id;
        ?>
        <li>
            <div> <h2>{{$student->name}}</h2>   Degree:
                @if(is_null($degree->degree))
                    No Degree
                @else
                    {{$degree->degree}}
                @endif
                <div class="row">
                    <button onclick="showSlider({{$i}})" id="showSlider{{$i}}">Edit Degree</button>
                    <span style="display:none" id="span{{$i}}">
                                    <form method="POST" action="{{route('subject.addDegree',$degree->id)}}">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                    <input type="range" oninput="displayDegree({{$i}})" onchange="displayDegree({{$i}})" min="2" max="5" step="0.5" id="range{{$i}}">
                                    <input type="text" name="degree"  readonly ="true" id="val{{$i}}">
                                    <button type="submit">Update degree</button></form></span>
                </div>

                <?php

                }

            }
        }
        ?>
    </div>
@endsection
