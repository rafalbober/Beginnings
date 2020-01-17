@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>New Subject</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{route('lesson.store')}}">
                @csrf

                <label>Title: <input type="text" name="title" ></label> <br>
                <label>Description: <input type="text" name="description" ></label> <br>
                <input type="hidden" name="id" value={{$index}} <br>
                <input type="submit"  value="Create">
            </form>
        </div>
    </div>
</div>
@endsection
