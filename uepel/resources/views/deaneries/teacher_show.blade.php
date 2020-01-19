@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <h1>{{$teacher->name." ".$teacher->surname}}</h1>

                <h2>Email: {{$teacher->email}}</h2>



            </div>
        </div>
    </div>
@endsection
