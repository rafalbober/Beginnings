<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Üpel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Styles -->

    <style>
        /*
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
            background-color: red;
        }*/
        body{

            font-family: 'IBM Plex Sans', sans-serif;
            margin:0;
            padding:0;
            color: #7c7c7c;

        }

        .banner{

            height: 100vh;
            width: 100%;
            background-color: #F2F2F2;




            background-position: center;
            background-size: cover;
            background-repeat: no-repeat;

        }
        .banner .navbar{
            margin-top: 0.5%;
        }
        .banner .navbar-brand{
            color:#D3D3D3;
            font-size: 1.8em ;
            font-weight: 200;
            margin-left: 2%;
        }
        .banner .nav li a{
            color: #D3D3D3;
            font-size: 1.0em;
        }
        .banner .info{
            margin-top: 15%;
            transform: translateY(-15%);
        }
        .banner .info h1{
            font-size: 2.5em;
            font-weight: 300;
            color: #dddfe2 ;
            letter-spacing: 2px;
        }
        .banner .info p{
            font-size: 2em;
            font-weight: 100;
            color: #a8a19f ;
            letter-spacing: 2px;
        }
        .banner .info a{


            color:#aaaaff;
            background-color: #0c5460;
            padding: 10px;
        }
        .banner .info a:hover{
            background-color: #0c5444;
        }
        .button-box{
            margin-top:20px;

        }
    </style>
</head>
<body>

<div class="container-fluid banner" style="background-image: url({{ URL::asset('images/landing.jpg') }});">
    <div class="row">
        <div class="col-md-12">
            <nav class="navbar navbar-expand-md">
                <div class="navbar-brand">
                    UEPEL
                </div>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href=# >Uepel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=# >Uepel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/faq">Faq</a>
                    </li>
                </ul>
            </nav>
        </div>
        <div class="col-md-8 offset-md-2 info ">
            <h1 class="text-center">WELCOME TO UEPEL</h1>
            <p class="text-center">firtst time here eher ehreh? </p>

            <div class="button-box col-lg-12 text-center">
                <a href="/student/login" class="btn text-center">Student Panel</a>
                <a href="/teacher/login" class="btn text-center">Teacher Panel</a>

            </div>
        </div>
    </div>
</div>
<!--

        <div class="flex-center position-ref full-height">

            <div class="content">
                <div class="flex-center">
                    navbar
                </div>
                <div class="title m-b-md">
                    Üpel
                </div>
                <div style="font-size:30px">
                    Stundeplatforme
                </div><br/>

                <div class="links">
                    <a href="/admin">Admin Login</a>
                    <a href="/home">Student Login</a>
                    <a href="/teacher">Teacher Login</a>
                    <a href="/faq">Faq</a>
                </div>
            </div>
        </div>
        -->
</body>
</html>
