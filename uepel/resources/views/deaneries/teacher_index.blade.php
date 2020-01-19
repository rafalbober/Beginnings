@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Teachers: </h2>
            <a href={{route('deaneries.teacher_create')}}>Create new...</a>
            <ul>
                @foreach ($teacher as $teachers)
                    <li><strong>{{ $teachers->email }}</strong></li>
                    <a href={{route('deaneries.teacher_show',$teachers->id)}}>details</a>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
