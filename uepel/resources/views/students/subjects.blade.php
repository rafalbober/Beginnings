@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Subjects: </h2>


                @foreach ($subjects as $subject)
                    <?php $notJoined = 1 ?>
                    <li><strong>{{ $subject->name }}</strong></li>
                    @foreach ($list as $listRecord)
                        @if ($listRecord->subject_id == $subject->id && Auth::id() == $listRecord->index )
                                <?php $notJoined = 0 ?>
                        @endif
                    @endforeach
                    @if ($notJoined == 1)
                        <form method="POST" action={{route('student.join', $subject->id)}}>
                            @csrf
                            <input type="submit" value="Join it!">
                        </form>
                        @else
                            <p><strong>Already requested!</strong></p>
                    @endif
                @endforeach

        </div>
    </div>
</div>
@endsection
