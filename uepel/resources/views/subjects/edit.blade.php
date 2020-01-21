<head>
    <style>
        body{
            background-image: url({{ URL::asset('images/b1.jpg') }});
            background-attachment: fixed;
            background-size: cover;
        }
        h2{
            color: #ebebeb;
        }
        label{
            color: #ebebeb;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4" style="background: rgba(0,0,0,0.4); margin-top: 2%;  box-shadow: 1px 4px 40px black">
            <h2 class="text-center" style="margin: 2%">Edit subject:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('subject.update',['id' =>$subject->id]) }}">
                @csrf
                {{ method_field('PATCH') }}
                <label style="padding-left: 10px">Current Name: {{$subject->name}}</label><br>
                <input type="text" name="name" placeholder="New name" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 15px "><br><br>
                <label style="padding-left: 10px">Current Description: {{$subject->description}}</label><br>
                <input type="text" name="description" placeholder="Description" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 15px "><br><br>
                <label style="padding-left: 10px">Current Capacity: {{$subject->signup_capacity}}   Current Signup Students number: {{$subject->signup_current}}</label><br>
                <input type="text" name="capacity" placeholder="Capacity" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 15px "><br><br>
                <input type="hidden" name="current" placeholder="Current" value="{{$subject->signup_current}}" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 15px "><br><br>
                <div class="col-md-12 text-center" style=""><input class="btn text-center" type="submit" name="update" value="Update" style="margin-top: 2%;margin-bottom:2%;font-size: 15px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%"></div>
            </form>
            <form method="POST" action="{{route('subject.delete', $subject->id)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE')  }}
                <div class="col-md-12 text-center" style=""><input class="btn text-center" type="submit" value="Delete" name="delete" style="margin-bottom:5%;font-size: 15px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%"></div>
            </form>
        </div>
    </div>
</div>
@endsection
