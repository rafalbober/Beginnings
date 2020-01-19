@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h2>{{$subject->name}}</h2>
                <ol>
                    @foreach ($subject->lesson as $lesson)
                        <li><strong>{{ $lesson->title }}</strong></li>
                        <a href={{route("student_lessons.show",$lesson->id)}}> details</a>
                    @endforeach
                </ol>

            </div>
        </div>
    </div>
@endsection
