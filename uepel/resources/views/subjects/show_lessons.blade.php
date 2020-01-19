@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <ul>
                    @foreach ($lessons as $lesson)
                        <li><strong>{{ $lesson->title }}</strong></li>
                        <a href={{route("lesson.show",$lesson->id)}}> details</a>
                    @endforeach
                </ul>

            </div>
        </div>
    </div>
@endsection
