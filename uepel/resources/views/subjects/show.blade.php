@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row">
                <h2>{{ $subject->name }} ({{ $subject->signup_capacity }})</h2><a href="{{route('subject.edit',$subject)}}">edit</a>
            </div>
            <p>{{ $subject->description }}</p>

            <a href={{route('lesson.create')}}>Create new lesson</a>

{{--            <ul>--}}
{{--                @foreach ($teacher->subject as $subject)--}}
{{--                    <li><strong>{{ $subject->name }}</strong></li>--}}
{{--                    <a href={{route("subject.show",$subject->id)}}>details</a>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
            <form method="POST" action="{{route('subject.delete', $subject->id)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE')  }}
                <input type="submit" value="Delete" name="delete">
            </form>
        </div>
    </div>
</div>
@endsection
