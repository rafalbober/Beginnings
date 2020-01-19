<head>
    <style>
        body{
            background-image: url({{ URL::asset('images/b1.jpg') }});
            background-attachment: fixed;
            background-size: cover;
            color: #d8d8d8
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container-fluid ">
    <div class="row justify-content-center">
        <div class="col-md-4" style="background: rgba(0,0,0,0.4); margin-top: 90px; height: 500px; box-shadow: 1px 4px 40px black">
            <h2 class=" text-center" style="margin-top: 2%; color: #d8d8d8">Change Password:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('teacher.update',['id' =>$teacher->id]) }}" style="margin-top: 10%">
                @csrf
                {{ method_field('PATCH') }}

                <input type="password" name="current" class="form-control" placeholder="Current Password" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px "><br>
                <input type="password" name="new" class="form-control" placeholder="New Password" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px " > <br>
                <input type="password" name="repeat" class="form-control" placeholder="Retype Password" style="background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding:20px; font-size: 20px "> <br>
                <div class="col-md-12 text-center" style="padding-top: 15%"><input type="submit" name="update" value="Update" class="btn " style="margin-bottom:5%;font-size: 20px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%" ></div>>
            </form>

        </div>
    </div>
</div>
@endsection
