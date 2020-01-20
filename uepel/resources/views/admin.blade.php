@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Üpel Admin</title>

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
                        <h2 class="col-md-12 text-center">Admin Panel</h2>

                        <img src="{{URL::asset('/images/avatar2.jpg')}}" class="rounded-circle">

                        <h5 style="margin: 2%">
                           Choose users to edit
                        </h5>

                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3;  width: 50%" href="{{route('deaneries.student_index')}}" >Teachers</a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 1%;  width: 50%" href="{{route('deaneries.teacher_index')}}" >Students</a> </div>


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
<body>
<div class="flex-center position-ref full-height">

    <div class="content">
        <div class="title m-b-md">
            Üpel Adm
        </div>
        <div style="font-size:30px">
            Stundeplatforme
        </div><br/>

        <div class="links">
            <a href="#">About Me</a>
            <a href="#">Subjects</a>
            <a href="{{route('deaneries.student_index')}}">Students</a>
            <a href="{{route('deaneries.teacher_index')}}">Teachers</a>
        </div>
    </div>
</div>
</body>
</html>
-->
