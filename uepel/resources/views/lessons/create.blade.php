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
    </style>
</head>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6" style="background: rgba(0,0,0,0.4); margin-top: 2%;  box-shadow: 1px 4px 40px black">
            <h2 class="text-center" style="margin: 2%">New Subject</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{route('lesson.store')}}">
                @csrf
                <input type="text" name="title" placeholder="Title" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 15px "><br>
                <input type="text" name="description" placeholder="Description" style="width:100%;background: transparent; border-radius: 0px; border: 0px; border-bottom: 1px solid gray; color: white; height: 40px; padding-left:10px; font-size: 15px "><br>
                <input type="hidden" name="id" value={{$index}} <br>
                <div class=" col-md-12 text-center" style=""><input class="btn text-center" type="submit"  value="Create" style="margin-top:5%;margin-bottom:5%;font-size: 15px ;background-color:#ebebeb; background-opacity:10%; border: 1px #ebebeb;width: 50%"></div>
            </form>
        </div>
    </div>
</div>
@endsection
