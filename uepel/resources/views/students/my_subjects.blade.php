@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 card">
                <h1></h1>
                <h2>Subjects I belong to: </h2>
                <div>
                    @foreach ($subjects as $subject)
                        <?php $notJoined = 1;
                        $exist = 0?>

                        @foreach ($list as $listRecord)
                            @if ($listRecord->subject_id == $subject->id && Auth::id() == $listRecord->index )
                                <?php $notJoined = 0 ?>
                                @if($listRecord->joined == 1)
                                    <?php $exist = 1 ?>
                                @endif
                            @endif
                        @endforeach
                        @if($exist == 1)
                            @if ($notJoined == 0)
                                <div class="card-body">
                                    <strong>{{ $subject->name }}</strong><br>
                                    <a href="{{route("student_lessons.show",$subject->id)}}"> See topics</a><br>
                                    <a href="{{route('student.resign',$subject->id)}}">Resign -> You can't join the course again</a>

                                </div>

                                @endif
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
