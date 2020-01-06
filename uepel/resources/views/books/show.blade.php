@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>{{ $book->title }} ({{ $book->isbn }})</h2>
            <p>{{ $book->description }}</p>
            <a href="/books/{{$book->id}}/edit">edit</a>
            <form method="POST" action="/books/{{ $book->id }}">
                {{ csrf_field() }}
                {{ method_field('DELETE')  }}
                <input type="submit" value="Delete" name="delete">
            </form>
        </div>
    </div>
</div>
@endsection
