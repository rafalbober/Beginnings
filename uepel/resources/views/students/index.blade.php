@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <h1>{{$student->name." ".$student->surname}}</h1>

            <h2>Email: {{$student->email}}</h2>

            <a href="{{route('student.edit',$student->id)}}">Change Password</a>

        </div>
    </div>
</div>
@endsection
