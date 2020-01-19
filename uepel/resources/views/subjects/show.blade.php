@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <h2>{{ $subject->name }} ({{ $subject->signup_capacity }})</h2><a href="{{route('subject.edit',$subject)}}">edit</a>
                </div>
                <p>{{ $subject->description }}</p>

                <a href={{route('lesson.create',$subject->id)}}>Create new lesson</a>

                <ol>
                    @foreach ($subject->lesson as $lesson)
                        <li><strong>{{ $lesson->title }}</strong></li>
                        <a href={{route("lesson.show",$lesson->id)}}> details</a>
                    @endforeach
                </ol>

            </div>
        </div>
    </div>
@endsection
