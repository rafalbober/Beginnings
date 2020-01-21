@extends('layouts.app')

@section('content')
    <div class="container col-md-6 mb-6 justify-content-center ">
        <div>
            <div class="col-md-6" style="margin-bottom: 2%">
                <h2>Teachers</h2>
                <a class="btn btm-md " style="background-color: #D3D3D3; font-size: 13px " href={{route('deaneries.teacher_create')}}>Create new Teacher</a>
            </div>
        </div>
        <div class="col-md-8" style=" margin-right: 10% ">
            <div class="media" style=" ">
                <div class="media-body" >
                    <div class="" style="margin-top: 1%">
                        @foreach ($teacher as $teachers)
                            <div class="" style=" margin-top: 1%;margin-bottom: 2%">
                                <h5 style="border-radius: 0px; border: 0px; border-bottom: 1px solid gray; ">{{ $teachers->email }} <a class="offset-10" style="" href={{route('deaneries.teacher_show',$teachers->id)}}>see details</a></h5>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
