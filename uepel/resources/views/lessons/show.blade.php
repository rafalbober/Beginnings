@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row" style=" margin-right: 10% ">

            <div class="media" style="padding-top: 2%;padding-bottom: 2% ">

                <div class="media-body" >

                    <div class="card" style="margin-top: 3%">
                        <div class="media" >
                            <img src="{{URL::asset('/images/subject.jpg')}}" width="30%"  >
                            <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%">
                                <h2>{{ $lesson->title }} </h2>
                                <p>{{ $lesson->description }}</p>
                                <a class="btn btm-md " style="background-color: #D3D3D3;" href="{{route('lesson.edit',$lesson->id)}}">edit</a>


                            </div>
                        </div>
                    </div>

                </div>
            </div>




    </div>







    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $lesson->title }} </h2>
            <p>{{ $lesson->description }}</p>
            <a href="{{route('lesson.edit',$lesson->id)}}">edit</a>
        </div>

    </div>
    <?php
    $Student = \App\Student::all();
        foreach ($Student as $student)
            {
                echo "<div class = 'row'>$student->name</div>";
            }

    ?>
</div>
@endsection
