@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Subjects: </h2>
            <ul>
                @foreach ($subjects as $subject)
                    <li><strong>{{ $subject->name }}</strong></li>
                <form method="POST" action={{route('student.join', $subject->id)}}>
                    @csrf
                    <input type="submit" value="Join it!">
                </form>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
