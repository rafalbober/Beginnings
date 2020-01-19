@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1></h1>
            <h2>Subjects: </h2>
            <ul>
                @foreach ($subjects as $subject)
                    <?php $notJoined = 1;
                    $exist = 0?>

                    @foreach ($list as $listRecord)
                        @if ($listRecord->subject_id == $subject->id && Auth::id() == $listRecord->index )
                            <?php $notJoined = 0 ?>
                            @if($listRecord->joined)
                                <?php $exist = 1 ?>
                            @endif
                        @endif
                    @endforeach
                    @if($exist == 0)
                        @if ($notJoined == 1)
                                <li><strong>{{ $subject->name }}</strong></li>
                            <form method="POST" action={{route('student.join', $subject->id)}}>
                                @csrf
                                <button class="btn btn-primary">Join it!</button>
                            </form>
                        @else
                                <li><strong>{{ $subject->name }}</strong></li>
                            <p>Already requested!</p>
                        @endif
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
