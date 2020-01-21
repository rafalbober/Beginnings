@extends('layouts.app')

@section('content')



<div class="container">
    <div class="row" style=" margin-right: 10% ">
            <div class="media" style="padding-top: 2%;">
                <div class="media-body" >
                    <div class="card" style="">
                        <div class="media mb-5" >
                            <img src="{{URL::asset('/images/subject.jpg')}}" width="30%"  >
                            <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%">
                                <h2>{{ $lesson->title }} </h2>
                                <p>{{ $lesson->description }}</p>
                               <div class="col-lg-12" style="margin-top: 5%">
                                <div class="dropdown ">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="list_students" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Students who joined the course
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="list_students">
                                        <?php
                                        $Student = \App\Student::all();
                                        $List = \App\Student_list::all();
                                        foreach ($Student as $student)
                                            {
                                            foreach ($List as $list)
                                                {
                                                if($student->id == $list->index && $list->subject_id == $lesson->subject_id)
                                                    {
                                                        echo "<p class='dropdown-item' >$student->name</p>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </div>
                                    <a class="btn btm-md " style="margin-left:2%;background-color: #D3D3D3;" href="{{route('lesson.edit',$lesson->id)}}">Edit Lesson</a>
                                </div>
                               </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
    </div>

@endsection
