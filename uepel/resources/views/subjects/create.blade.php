<head>
    <style>
        body{
            background-image: url({{ URL::asset('images/b1.jpg') }});
            background-attachment: fixed;
            background-size: cover;

        }
        h1{
            color: white;
            margin-top: 40px;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')


<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-6" style="background: rgba(0,0,0,0.4); margin-top: 90px;  box-shadow: 1px 4px 40px black">
            <h2 class="text-center" style="margin-top: 2%; color:#ebebeb;">New Subject</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{route('subject.store')}}">
                @csrf

                <input type="text" name="name" class="form-control" placeholder="Name" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px ">
                <input type="text" name="description" class="form-control" placeholder="Description" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px ">
                <input type="text" name="capacity" class="form-control" placeholder="Capacity" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px ">
                <div class="col-md-12 text-center" style="padding-top: 15%"><input type="submit" value="Create" class="btn " style="margin-bottom:5%;font-size: 20px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%" ></div>

            </form>
        </div>
    </div>
</div>
@endsection
