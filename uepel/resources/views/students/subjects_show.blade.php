@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class=" text-center " >
            <h1></h1>
            <h2 style="font-weight: 500; font-size: 60px">Subjects: </h2>

        </div>
    </div>
    <div class="row" style=" margin-left: 10%;margin-right: 10%">

        @foreach ($subjects as $subject)
            <div class="col-sm-4 text-center" style="   margin-top:5%;margin-bottom: 2%" >

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
                                <div class="single-subject text-center" style="border:1px solid #ebebeb; background-color: #ffffffff;">
                                    <div class="subject-name" style="height: 200px; position: relative; background-image: url({{ URL::asset('images/subject.jpg') }});-webkit-background-size: cover; background-size: cover;background-position: center">
                                        <h2 style="border-radius: 60px;color: #fff0ff;background-color: #3f3f3f; border: solid #3f3f3f; font-size: 17px;text-align: center; padding: 5px; position: absolute; width: 85% ; margin: 0; bottom: -25px; left:8%;letter-spacing: 2px ">{{ $subject->name }}</h2>
                                    </div>
                                    <div class="subject-description" style="padding:30px 30px 20px;font-size: 15px;font-weight: 400">
                                        <p style="padding-top: 10%">sth abuout the subject idk loremm lorem weuyrter wuegr ewyr weygruweyt wueygr weugrs fwye fweyf </p>
                                        <p><strong>Already requested!</strong></p>
                                         <form method="POST" action={{route('student.join', $subject->id)}}>
                                            @csrf
                                            <input class="btn btm-md " style="background-color: #D3D3D3;" type="submit" value="Join it!">
                                        </form>
                                    </div>
                                </div>

                    @else
                                        <div class="single-subject text-center" style="border:1px solid #ebebeb; background-color: #ffffffff;">
                                            <div class="subject-name" style="height: 200px; position: relative; background-image: url({{ URL::asset('images/subject.jpg') }});-webkit-background-size: cover; background-size: cover;background-position: center">
                                                <h2 style="border-radius: 60px;color: #fff0ff;background-color: #3f3f3f; border: solid #3f3f3f; font-size: 17px;text-align: center; padding: 5px; position: absolute; width: 85% ; margin: 0; bottom: -25px; left:8%;letter-spacing: 2px ">{{ $subject->name }}</h2>
                                            </div>
                                            <div class="subject-description" style="padding:30px 30px 20px;font-size: 15px;font-weight: 400">
                                                <p style="padding-top: 10%">sth abuout the subject idk loremm lorem weuyrter wuegr ewyr weygruweyt wueygr weugrs fwye fweyf </p>
                                                <p><strong>Already requested!</strong></p>
                                            </div>
                                        </div>


                    @endif
                    @endif
            </div>
        @endforeach
    </div>

</div>
@endsection


