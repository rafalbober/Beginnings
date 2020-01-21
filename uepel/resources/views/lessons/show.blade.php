@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row" style=" margin-right: 10% ">
            <div class="media" style="">
                <div class="media-body" >
                    <div class="card" style="">
                        <div class="media mb-6" >
                            <img src="{{URL::asset('/images/subject.jpg')}}" width="30%" height="100%" >
                            <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%;">
                                <h2>{{ $lesson->title }} </h2>
                                <p>{{ $lesson->description }}</p>
                                <a class="btn btm-md " style="margin-left:2%;background-color: #D3D3D3;" href="{{route('lesson.edit',$lesson->id)}}">Edit Lesson</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
@endsection
