@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Edit book:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('books.update', $book) }}">
                {{ csrf_field() }}
                {{ method_field('update') }}
                <label>ISBN: </label><input type="text" name="isbn" value="{{ $book->isbn }}">
                <label>Title: </label><input type="text" name="title" value="{{ $book->title }}">
                <label>Description: </label><input type="text" name="description" value="{{ $book->description }}">
                <input type="submit" name="update" value="Update">
            </form>
        </div>
    </div>
</div>
@endsection
