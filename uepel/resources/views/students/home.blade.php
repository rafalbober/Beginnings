@extends('layouts.app')
    <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Üpel Student</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>


<body>










<div class="container-fluid mb-12">
    <div class="row justify-content-center "  >
        <div class=" text-center " >
            <h1></h1>
            <br style="font-weight: 500; font-size: 60px"> </br></br> </h2>

        </div>
    </div>

    <div class="container-fluid mb-5 justify-content-center"  >

        <div class="row justify-content-center">
            <div class="col-md-6 justify-content-center" style="background: #ffffff">
                <div class="card md-12">
                    <div class="card-body text-center">
                        <h2 class="col-md-12 text-center">Student Panel</h2>

                        <img src="{{URL::asset('/images/avatar4.jpeg')}}" class="rounded-circle">
                        <h3 class="card-title mt-3">  {{$student->name}}</h3>
                        <h4 class="card-title mt-3">  {{$student->email}}</h4>



                        <h5 style="margin: 2%">
                            Choose users to edit
                        </h5>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('student.index',$student->id)}}" >About me </a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('student.my_subjects')}}">My Subjects</a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('student.subjects_show')}}"> Available Subjects</a> </div>


                    </div>
                </div>

            </div>



        </div>
    </div>

</div>

</div>
</div>
</body>

</html>


















<!--

<div class="container-fluid mb-12">
    <div class="row justify-content-center "  >
        <div class=" text-center " >
            <h1></h1>
            <br style="font-weight: 500; font-size: 60px"></br></br></h2>

        </div>
    </div>

    <div class="container-fluid mb-5"  >

        <div class="row">
            <div class="col-md-2" style="background: #ffffff">
                <div class="card md-12">
                    <div class="card-body text-center">
                        <h2 class="col-md-12 text-center">Student Panel</h2>

                        <img src="{{URL::asset('/images/avatar4.jpeg')}}" class="rounded-circle">
                        <h3 class="card-title mt-3">  {{$student->name}}</h3>
                        <h4 class="card-title mt-3">  {{$student->email}}</h4>

                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('teacher.index',$student->id)}}" >About me </a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('student.my_subjects')}}">My Subjects</a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('student.subjects_show')}}"> Available Subjects</a> </div>


                    </div>
                </div>

            </div>
            <div class="col-md-8 ">
                <div class="container mb-5">
                    <div>
                        <h2 class="text-left">
                            My Subjetcs
                        </h2>
                         </div>



                </div>


            </div>
        </div>

    </div>

</div>
</div>
</body>

</html>
-->
<!--
<body>
<div class="flex-center position-ref full-height">


    <div class="content">
        <div class="title m-b-md">
            Üpel Student

        </div>
        <div style="font-size:30px">
            Stundeplatforme
        </div><br/>

        <div class="links">
            <a href="{{route('student.index',$student->id )}}">About Me</a>
            <a href="{{route('student.subjects_show')}}"> Available Subjects</a>
            <a href="{{route('student.my_subjects')}}">My Subjects</a>
            <a href="#">Teachers</a>
        </div>
    </div>
</div>
</body>
</html>
-->
