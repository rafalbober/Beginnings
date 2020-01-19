@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class=" text-center " >
            <h1></h1>
            <h2 style="font-weight: 500; font-size: 60px">Subjects: </h2>
            <a class="btn-lg btn-dark" style="font-size: 30px; font-weight: 400" href={{route('subject.create')}}>Create new</a>
        </div>
    </div>

    <div class="row" style="margin-left:10%; margin-right: 10% ">
                @foreach ($teacher->subject as $subject)
                        <div class="col-sm-4 text-center" style="   margin-top:5%;margin-bottom: 2%" >
                           <div class="single-subject text-center" style="border:1px solid #ebebeb; background-color: #ffffffff;">
                               <div class="subject-name" style="height: 200px; position: relative; background-image: url({{ URL::asset('images/subject.jpg') }});-webkit-background-size: cover; background-size: cover;background-position: center">
                                <h2 style="border-radius: 60px;color: #fff0ff;background-color: #3f3f3f; border: solid #3f3f3f; font-size: 17px;text-align: center; padding: 5px; position: absolute; width: 85% ; margin: 0; bottom: -25px; left:8%;letter-spacing: 2px ">{{ $subject->name }}</h2>
                            </div>
                            <div class="subject-description" style="padding:30px 30px 20px;font-size: 15px;font-weight: 400">
                                <p style="padding-top: 10%">sth abuout the subject idk loremm lorem weuyrter wuegr ewyr weygruweyt wueygr weugrs fwye fweyf </p>
                                <a class="btn btm-md " style="background-color: #D3D3D3;" href={{route("teacher.request",$subject->id)}}>request</a>
                                <a class="btn btm-md " style="background-color: #D3D3D3;" href={{route("subject.show",$subject->id)}}>more details</a>
                            </div>
                           </div>
                        </div>


                @endforeach
    </div>

</div>
@endsection
