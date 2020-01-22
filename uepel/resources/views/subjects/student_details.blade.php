@extends('layouts.app')

@section('content')

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

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h3><a href="{{route("subject.show",$subject->id)}}>">Back to Subject</a></h3>
                <h1></h1>
                <div class="card">
                <h2 style="margin: 2%">Subject: {{$subject->name}} </h2>
                <h3 style="margin: 2%; margin-bottom: 5%">Student: {{$student->name}} {{$student->surname}}</h3>
                <div ><ol type = "1">
                    <?php $j = 0; $i = 0; $g = 0; $avg = 0; ?>
                    @foreach ($subject->lesson as $lessons)
                        @foreach($student->degree as $degrees)
                            @if($degrees->lesson_number == $lessons->id)
                                <li>
                                    {{$lessons->title}} Degree:

                                    <?php
                                        if(!is_null($degrees->degree))
                                            {
                                                echo $degrees->degree;
                                                $avg = $avg + $degrees->degree;
                                                $j = $j+1;
                                            }
                                        else
                                            {
                                                echo 'No Degree';
                                            }

                                    ?>
                                    <div class="row">
                                        <button onclick="showSlider({{$i}})" id="showSlider{{$i}}" class="btn btm-md " style="font-size:10px;background-color: #D3D3D3;  width: 30%">Edit Degree</button>
                                        <span style="display:none" id="span{{$i}}">
                                    <form method="POST" action="{{route('lesson.addDegree',$degrees->id)}}">
                                        @csrf
                                        {{ method_field('PATCH') }}
                                    <input type="range" oninput="displayDegree({{$i}})" onchange="displayDegree({{$i}})" min="2" max="5" step="0.5" id="range{{$i}}">
                                    <input type="text" name="degree"  readonly ="true" id="val{{$i}}">
                                    <button type="submit"class="btn btm-md " style="font-size:10px;background-color: #D3D3D3;  width: 30%">Update degree</button></form></span>
                                    </div>
                                </li>

                                <?php $i = $i+1?>
                            @endif
                        @endforeach
                        @foreach($student->presence as $presences)
                                @if($presences->lesson_number == $lessons->id)
                                    Presence:
                                    @if(is_null($presences->presence))
                                        Not Checked
                                    @elseif($presences->presence == 0)
                                        Absent
                                    @else
                                        Present

                                    @endif
                                    <div class = "row">
                                        <button onclick="showCheck({{$g}})" id="showCheck{{$g}}"class="btn btm-md " style="font-size:10px;background-color: #D3D3D3;  width: 30%">Edit Presence</button>
                                        <span style="display:none" id="szpan{{$g}}">
                                                <form method="POST" action="{{route('lesson.addPresence',$presences->id)}}">
                                                    @csrf
                                                    {{ method_field('PATCH') }}
                                                <label>Presence: </label><input type="checkbox" name="presence">
                                                <button type="submit"class="btn btm-md " style="font-size:10px;background-color: #D3D3D3;  width: 30%">Update Presence</button></form></span>
                                    </div>
                                    <br>
                                    <?php $g = $g + 1?>
                                @endif
                            @endforeach
                    @endforeach
                </ol>
                </div>

                <?php if ($avg != 0)
                    $avg = $avg / $j;
                ?>


                <p class="text-center" style="margin-left: 2%">Average:
                    <?php
                    if ($avg != 0)
                        echo $avg;
                     ?></p>
                <p class="text-center" style="margin-left: 2%">Ocena koncowa:
                    <?php
                    if(!is_null($subjectDegree->degree))
                    {
                        echo $subjectDegree->degree;
                    }
                    else
                        {
                            echo 'No Degree';
                        }
                    ?></p>
                    <div style="margin-left: 3%;margin-bottom: 2%" class="col-md-12 justify-content-center">
                        <button onclick="showSlider({{$i}})" id="showSlider{{$i}}" class="btn btm-md justify-content-center " style=" font-size:10px;background-color: #D3D3D3;  width: 90%">Edit Degree</button>
                        <span style="display:none" id="span{{$i}}">
                            <form method="POST" action="{{route('subject.addDegree',$subjectDegree->id)}}">
                                @csrf
                                {{ method_field('PATCH') }}
                                <input type="range" oninput="displayDegree({{$i}})" onchange="displayDegree({{$i}})" min="2" max="5" step="0.5" id="range{{$i}}">
                                <input type="text" name="degree"  readonly ="true" id="val{{$i}}">
                                <button type="submit"class="btn btm-md " style="font-size:10px;background-color: #D3D3D3;  width: 30%">Update degree</button>
                            </form>
                        </span>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
