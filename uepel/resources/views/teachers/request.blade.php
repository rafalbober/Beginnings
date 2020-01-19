@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3><a href="/subjects/{{Auth::user()->id}}">Back to Subjects</a></h3>
            <h2>Requests: </h2>
            <ul>
                @foreach ($list as $lists)
                    @if ($lists->subject_id == $subject->id && is_null($lists->joined))
                        @php ($student = \App\Student::findOrFail($lists->index))
                        <li><h1>{{$student->email}}</h1>
                            <div class = "row">
                                <form method="POST" action="{{route('request.accept', $lists->id)}}">
                                    @csrf
                                <input type="submit" value="Accept" name="accept" class="btn btn-primary">
                                </form>

                                <form method="POST" action="{{route('request.reject', $lists->id)}}">
                                    @csrf
                                    <input type="submit" value="Reject" name="reject" class="btn btn-primary">
                                </form>
                            </div>
                            </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
