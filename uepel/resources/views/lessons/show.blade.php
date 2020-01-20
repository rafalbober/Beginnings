@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $lesson->title }} </h2>
            <p>{{ $lesson->description }}</p>
            <a href="{{route('lesson.edit',$lesson->id)}}">edit</a>
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
    $Presence = \App\Presence::all();

    foreach($Student as $student){
        foreach ($Degree as $degree)
            {
                if($student->id == $degree->student_index && $lesson->id == $degree->lesson_number){
                    $i = $student->id;
                    ?>
                        <li>
                            <div> <h2>{{$student->name}}</h2>   Degree: {{$degree->degree}}
                                <div class="row">
                                    <button onclick="showSlider({{$i}})" id="showSlider{{$i}}">Edit Degree</button>
                                    <span style="display:none" id="span{{$i}}">
                                    <form method="POST" action="{{route('lesson.addDegree',$degree->id)}}">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                    <input type="range" oninput="displayDegree({{$i}})" onchange="displayDegree({{$i}})" min="2" max="5" step="0.5" id="range{{$i}}">
                                    <input type="text" name="degree"  readonly ="true" id="val{{$i}}">
                                    <button type="submit">Update degree</button></form></span>
                                </div>

                    <?php


                    foreach ($Presence as $presence)
                        {
                            if($degree->student_index == $presence->student_index && $degree->lesson_number == $presence->lesson_number)
                                {
                                    ?>
                                            Presence:
                                            @if(is_null($presence->presence))
                                                Not Checked
                                                @elseif($presence->presence == 0)
                                                    Absent
                                                @else
                                                    Present

                                            @endif
                                            <div class = "row">
                                                <button onclick="showCheck({{$i}})" id="showCheck{{$i}}">Edit Presence</button>
                                                <span style="display:none" id="szpan{{$i}}">
                                                <form method="POST" action="{{route('lesson.addPresence',$presence->id)}}">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                <label>Presence: </label><input type="checkbox" name="presence">
                                                <button type="submit">Update Presence</button></form></span>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                 }
                        }
                }

            }
        }

    ?>
</div>
@endsection
