@extends('layouts.app')

@section('content')


    <div class="container mb-5">
        <div>
            <div class="col-md-6">
                <h2>{{ $subject->name }} ({{ $subject->signup_capacity }})</h2>
                <a href="{{route('subject.edit',$subject)}}">edit subject</a>
                <p>{{ $subject->description }}</p>
                <a class="btn btm-md " style="background-color: #D3D3D3;  " href={{route('lesson.create',$subject->id)}}>Create new lesson</a>
            </div>
            </div>
            <div class="row" style=" margin-right: 10% ">
                 @foreach ($subject->lesson as $lesson)
                     <div class="media" style="padding-top: 2%;padding-bottom: 2% ">
                         <div class="media-body" >
                             <div class="card" style="margin-top: 3%">
                                <div class="media" >
                                 <img src="{{URL::asset('/images/subject.jpg')}}" width="30%"  >
                                 <div class="media-body text-muted" style="margin-left: 2%; margin-top: 1%">
                                    <h2>{{ $lesson->title }}</h2>
                                    <p>tu powinien byc opis przedmiotu ktory zostal oddany chyba, ale nie wiem to nowy koncept.
                                        Co sądzicie dzieciaczki wypowiedzcie się i podlączcie mi tu php jesli ja zapomne
                                        loftki <3 buziaczek
                                        </br> ps całość powinna byc w tej hujowej pętli foricz </p>
                                    <a class="btn btm-md " style="background-color: #D3D3D3;"href={{route("lesson.show",$lesson->id)}}> details</a>
                                 </div>
                                </div>
                             </div>
                        </div>
                     </div>
                  @endforeach
            </div>
        </div>
@endsection
