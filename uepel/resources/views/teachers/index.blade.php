<head>
    <style>
        body {
            background-image: url({{ URL::asset('images/b1.jpg') }});
            background-attachment: fixed;
            background-size: cover;
        }
        h2{
            color: #ebebeb;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="container-fluid mb-6"  >
                <div class="row">
                    <div class="col-md-10" style="background: rgba(0,0,0,0.4); margin-top: 90px; height: 500px; box-shadow: 1px 4px 40px black">
                        <div class=" md-12">
                            <div class="card-body text-center">
                                <h2 class="col-md-12 text-center">Your account</h2>
                                <img src="{{URL::asset('/images/avatar1.jpg')}}" class="rounded-circle">
                                <h2 style="margin-top: 2%">{{$teacher->name." ".$teacher->surname}}</h2>
                                <h2>Email: {{$teacher->email}}</h2>
                                <div class="col mb-12"><a class="btn btm-md " style="background-color: #D3D3D3; margin: 5%; width: 80%" href="{{route('teacher.edit',$teacher->id)}}">Change Password</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
         </div>
    </div>
</div>
@endsection
