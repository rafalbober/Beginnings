@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">

        <div class="col-md-8">
            <h1>{{$lesson->title}}</h1>


            {{$lesson->description}}


        </div>
    </div>
</div>
@endsection
