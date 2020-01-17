@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Edit subject:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('subject.update',['subject' =>$subject->id]) }}">
                @csrf
                {{ method_field('PATCH') }}
                <label>Name: <input type="text" name="name"></label> <br>
                <label>Desciption: <input type="text" name="description"  ></label> <br>
                <label>Capacity: <input type="text" name="capacity"></label> <br>
                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>
</div>
@endsection
