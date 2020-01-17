@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Subjects: </h2>
            <a href={{route('subject.create')}}>Create new...</a>
            <ul>
                @foreach ($subjects as $subject)
                    <li><strong>{{ $subject->name }}</strong></li>
                    <a href="#">join</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
