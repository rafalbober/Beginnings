@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $subject->name }} ({{ $subject->sub_capacity }})</h2>
            <p>{{ $subject->description }}</p>
            <a href="/subjects/{{$subject->id}}/edit">edit</a>
            <form method="POST" action="/books/{{ $subject->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE')  }}
                <input type="submit" value="Delete" name="delete">
            </form>
        </div>
    </div>
</div>
@endsection
