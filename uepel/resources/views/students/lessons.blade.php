@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <?php $avg = 0; $i = 0;?>
                <h2>{{$subject->name}}</h2>
                <ol>
                    @foreach ($subject->lesson as $lesson)
                        <li>
                            <strong>{{ $lesson->title }}</strong> Degree:
                            <?php
                                $deg = (new App\Http\Controllers\DegreeController)->showLessonDegree($subject->id, $lesson->id);
                                if(!is_null($deg))
                                    {
                                    echo $deg;
                                    $avg = $avg + $deg;
                                    $i = $i + 1;
                                    }
                                else
                                    echo 'No Degree';
                            ?>
                        </li>
                        <a href={{route("student_lessonShowDetails",$lesson->id)}}> details</a>
                    @endforeach

                        <?php if ($avg != 0)
                                $avg = $avg / $i;
                        ?>



                </ol>

            </div>
            <h3>
                Degree:
                <?php
                    $deg = (new App\Http\Controllers\DegreeController)->showDegree($subject->id);
                    if(!is_null($deg))
                        echo $deg;
                    else
                        echo 'No Degree';
                ?>
                Average:
                <?php
                    if ($avg != 0)
                        echo $avg;
                ?>
            </h3>
        </div>
    </div>
@endsection
