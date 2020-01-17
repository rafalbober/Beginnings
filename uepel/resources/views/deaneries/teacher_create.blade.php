@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2>New Teacher</h2>
            @if( $errors->any() )
                <div class="alert alert-danger">
                    <ul>
                    @foreach( $errors->all() as $error )
                        <li> {{ $error }} </li>
                    @endforeach
                    </ul>
                </div>
            @endif


            <form method="POST" action="{{route('deaneries.teacher_store')}}">
                @csrf

                <label>Name: <input type="text" name="name" ></label> <br>
                <label>Surname: <input type="text" name="surname" ></label> <br>
                <label>email: <input type="text" name="email" ></label> <br>
                <label>password: <input type = "text" name = "password" ></label>
                <input type="submit"  value="Create">
            </form>
        </div>
    </div>
</div>
@endsection
