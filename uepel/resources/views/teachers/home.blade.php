@extends('layouts.app')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Üpel Teacher</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
</head>


<body>
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
                        <h2 class="col-md-12 text-center">Teacher Panel</h2>
"
                        <img src="{{URL::asset('/images/avatar1.jpg')}}" class="rounded-circle">
                        <h3 class="card-title mt-3">  {{$teacher->name}}</h3>
                        <h4 class="card-title mt-3">  {{$teacher->email}}</h4>
                        <p>
                            I admire good jokes, passats and some lemonade.
                        </p>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('teacher.index',$teacher->id)}}" >About me </a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('subjects.index',$teacher->id)}}" >My Subjects </a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="#" >Add new Subject </a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="#" >My Students</a> </div>
                        <div class="col mb-12">
                            <a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="#" >Requests</a> </div>


                    </div>
            </div>

            </div>
            <div class="col-md-8 ">
                <div class="container mb-5">

                <h2 class="text-left">
                    Activity
                </h2>
                <div class="media" style="padding-top: 2%;padding-bottom: 2%">
                    <img src="{{URL::asset('/images/avatar1.jpg')}}" width="48" class="rounded-circle">
                    <div class="media-body">
                        <p class="mb-1" style="margin-left: 1%">
                            <a href="#">{{$teacher->name}} </a>  added new subject , a while ago
                        </p>
                        <div class="card" style="margin-top: 3%">
                            <div class="media" >
                                <img src="{{URL::asset('/images/subject.jpg')}}" width="20%" >
                                <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%">
                                    <h5>subject name</h5>
                                    <p>tu powinien byc opis przedmiotu ktory zostal oddany chyba, ale nie wiem to nowy koncept.
                                    Co sądzicie dzieciaczki wypowiedzcie się i podlączcie mi tu php jesli ja zapomne
                                    loftki <3 buziaczek
                                        </br> ps całość powinna byc w tej hujowej pętli foricz </p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                    <div class="media" style="padding-top: 2%;padding-bottom: 2%">
                        <img src="{{URL::asset('/images/avatar1.jpg')}}" width="48" class="rounded-circle" style="margin-bottom: 5%">
                        <div class="media-body">
                            <p class="mb-1" style="margin-left: 1%">
                                <a href="#">{{$teacher->name}} </a>  added new subject , a while ago
                            </p>
                            <div class="card" style="margin-top: 3%">
                                <div class="media" >
                                    <img src="{{URL::asset('/images/subject.jpg')}}" width="20%" >
                                    <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%">
                                        <h5>subject name</h5>
                                        <p>tu powinien byc opis przedmiotu ktory zostal oddany chyba, ale nie wiem to nowy koncept.
                                            Co sądzicie dzieciaczki wypowiedzcie się i podlączcie mi tu php jesli ja zapomne
                                            loftki <3 buziaczek
                                            </br> ps całość powinna byc w tej hujowej pętli foricz </p>
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
</div>
</body>

</html>

    <!-- Styles -->
<!--  <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>

<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title m-b-md">
            Üpel Teacher
            {{$teacher->email}}
        </div>
        <div style="font-size:30px">
            Stundeplatforme
        </div><br/>

        <div class="links">
            <a href="{{route('teacher.index',$teacher->id)}}">About Me</a>
            <a href="{{route('subjects.index',$teacher->id)}}">Subjects</a>
            <a href="#">Students</a>
            <a href="#">Teachers</a>
        </div>
    </div>
</div>
</body>


</html>
-->
