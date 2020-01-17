@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $lesson->title }} </h2>
            <p>{{ $lesson->description }}</p>
            <a href="{{route('lesson.edit',$lesson->id)}}">edit</a>
        </div>
    </div>
</div>
@endsection
