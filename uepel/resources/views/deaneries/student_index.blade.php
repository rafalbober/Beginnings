@extends('layouts.app')

@section('content')
    <div class="container col-md-6 mb-6 justify-content-center ">
        <div>
            <div class="col-md-6" style="margin-bottom: 2%">
                <h2>Students</h2>
                <a class="btn btm-md " style="background-color: #D3D3D3; font-size: 13px " href={{route('deaneries.student_create')}}>Create new Student</a>
            </div>
        </div>
        <div class="col-md-8" style=" margin-right: 10% ">
            <div class="media" style=" ">
                <div class="media-body" >
                    <div class="" style="margin-top: 1%">
                        @foreach ($student as $students)
                          <div class="" style=" margin-top: 1%;margin-bottom: 2%">
                              <h5 style="border-radius: 0px; border: 0px; border-bottom: 1px solid gray; ">{{ $students->email }} <a class="offset-10" style="" href={{route('deaneries.student_show',$students->id)}}>see details</a></h5>
                           </div>
                         @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
