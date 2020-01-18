@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Requests: </h2>
            <ul>
                @foreach ($list as $lists)
                    @if ($lists->subject_id == $subject->id && is_null($lists->joined))
                        @php ($student = \App\Student::findOrFail($lists->index))
                        <li><h1>{{$student->email}}</h1>
                            <div class = "row">
                                <form method="POST" action="{{route('request.accept', $lists->id)}}">
                                    @csrf
                                <input type="submit" value="Accept" name="accept">
                                </form>

                                <form method="POST" action="{{route('request.reject', $lists->id)}}">
                                    @csrf
                                    <input type="submit" value="Reject" name="reject">
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
