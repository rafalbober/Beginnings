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


            <form method="POST" action="{{ route('subject.update', $subject) }}">
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <label>ISBN: </label><input type="text" name="isbn" value="{{ $subject->name }}">
                <label>Title: </label><input type="text" name="title" value="{{ $subject->description }}">
                <label>Description: </label><input type="text" name="description" value="{{ $subject->description }}">
                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>
</div>
@endsection
