@extends('layouts.app')

@section('content')


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
                            <div> <h2>{{$student->name}}</h2>   Degree:
                                @if(is_null($degree->degree))
                                    No Degree
                                @else
                                    {{$degree->degree}}
                                @endif
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


<div class="container">
    <div class="row" style=" margin-right: 10% ">
            <div class="media" style="padding-top: 2%;">
                <div class="media-body" >
                    <div class="card" style="">
                        <div class="media mb-5" >
                            <img src="{{URL::asset('/images/subject.jpg')}}" width="30%"  >
                            <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%">
                                <h2>{{ $lesson->title }} </h2>
                                <p>{{ $lesson->description }}</p>
                               <div class="col-lg-12" style="margin-top: 5%">
                                <div class="dropdown ">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="list_students" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Students who joined the course
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="list_students">
                                        <?php
                                        //$Student = \App\Student::all();
                                        $List = \App\Student_list::all();
                                        foreach ($Student as $student)
                                            {
                                            foreach ($List as $list)
                                                {
                                                if($student->id == $list->index && $list->subject_id == $lesson->subject_id)
                                                    {
                                                        echo "<p class='dropdown-item' >$student->name</p>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                    <a class="btn btm-md " style="margin-left:2%;background-color: #D3D3D3;" href="{{route('lesson.edit',$lesson->id)}}">Edit Lesson</a>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>
    </div>
@endsection
