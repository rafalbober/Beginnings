@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>Change password:</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{ route('student.update',['id' =>$student->id]) }}">
                @csrf
                {{ method_field('PATCH') }}
                <label>Current Password: <br><input type="password" name="current"></label> <br>
                <label>New Password: <br><input type="password" name="new"></label> <br>
                <label>Retype Password: <br><input type="password" name="repeat"></label> <br>
                <input type="submit" name="update" value="Update">
            </form>

        </div>
    </div>
</div>
@endsection
