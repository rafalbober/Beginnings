@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>New book:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('subjects.store') }}" >

                <label>Title: </label><input type="text" name="name" > <br>
                <label>Description: </label><input type="text" name="signup_capacity" > <br>
                <input type="submit" name="create" value="Create">
            </form>
        </div>
    </div>
</div>
@endsection
