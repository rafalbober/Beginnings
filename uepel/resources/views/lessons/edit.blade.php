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
            font-size: 20px;
            color: #ebebeb;
        }
        input {
            font-size: 20px;
        }
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="background: rgba(0,0,0,0.4); margin-top: 2%;  box-shadow: 1px 4px 40px black">
            <h2 class="text-center" style="margin: 3%">Edit subject:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('lesson.update', $lesson) }}">
                @csrf
                {{ method_field('PATCH') }}
                <label style="padding-left: 10px">Current Name: {{$lesson->title}}</label><br>
                <input type="text" name="title" placeholder="New name" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 20px "><br><br>
                <label style="padding-left: 10px">Current Description: {{$lesson->description}}</label><br>
                <input type="text" name="description" placeholder="New Description" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 20px "><br><br>
                <div class="col-md-12 text-center" style=""><input class="btn text-center" type="submit" name="update" value="Update" style="margin-top: 2%;margin-bottom:2%;font-size: 15px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%"></div>
            </form>
            <form method="POST" action="{{route('lesson.delete', $lesson->id)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE')  }}
                <div class="col-md-12 text-center" style=""><input  class="btn text-center"  type="submit" value="Delete" name="delete" style="margin-bottom:5%;font-size: 15px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%"></div>
            </form>
        </div>
    </div>
</div>
@endsection
