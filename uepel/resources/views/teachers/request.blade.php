@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Requests: </h2>
            <ul>
                @foreach ($list as $lists)
                    @if ($lists->subject_id == $subject->id)
                        @php ($student = \App\Student::findOrFail($lists->index))
                        <li><strong>{{$student->email}}</strong></li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
