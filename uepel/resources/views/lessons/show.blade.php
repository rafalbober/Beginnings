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
    </script>
    <style>
        label, input, button, form {
            display: inline;
        }
    </style>
    <?php
    $Student = \App\Student::all();
    $i = 0;
        foreach ($Student as $student)
            {
                echo '<div class="row">' . $student->name . ' <button onclick="showSlider(' . $i . ')" id="showSlider' . $i . '">Choose degree</button><span style="display:none" id="span' . $i . '"><form method="POST"><input type="range" oninput="displayDegree(' . $i . ')" onchange="displayDegree(' . $i . ')" min="2" max="5" step="0.5" id="range' . $i . '"> <input type="text" disabled id="val' . $i . '""><label>Presence: </label><input type="checkbox" name="presence"><button type="submit">Add degree</button></form></span></div>';
                $i++;
            }

    ?>
</div>
@endsection
