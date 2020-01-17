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


            <form method="POST" action="{{ route('lesson.update', $lesson) }}">
                @csrf
                {{ method_field('PATCH') }}
                <label>Current Name: {{$lesson->title}}<br>Name: <input type="text" name="title"></label> <br>
                <label>Current Description: {{$lesson->description}}<br>Desciption: <input type="text" name="description"  ></label> <br>

                <input type="submit" name="update" value="Update">
            </form>
            <form method="POST" action="{{route('lesson.delete', $lesson->id)}}">
                {{ csrf_field() }}
                {{ method_field('DELETE')  }}
                <input type="submit" value="Delete" name="delete">
            </form>
        </div>
    </div>
</div>
@endsection
