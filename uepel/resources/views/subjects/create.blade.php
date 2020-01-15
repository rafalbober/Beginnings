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


            <form method="POST" action="../subject">
                @csrf

                <label>Title: <input type="text" name="name" ></label> <br>
                <label>Signup_Capacity: <input type="text" name="signup_capacity" ></label> <br>
                <input type="submit"  value="Create">
            </form>
        </div>
    </div>
</div>
@endsection
