@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Students: </h2>
            <a href={{route('deaneries.student_create')}}>Create new...</a>
            <ul>
                @foreach ($student as $students)
                    <li><strong>{{ $students->email }}</strong></li>
                    <a href={{}}>details</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
