@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-8">
                <h1>{{$teacher->name." ".$teacher->surname}}</h1>

                <h2>Email: {{$teacher->email}}</h2>

                <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="#resetModal" onclick="document.getElementById('reset').disabled = true">Reset password</button>
                <!-- Pop up modal -->
                <div class="modal fade" id="resetModal" tabindex="-1" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Reset teacher password</h4>
                            </div>
                            <div class="modal-body">
                                <p>Click randomize to create new password. It will appear here.</p>
                                <label>Password:</label><br>
                                <textarea id="newpassword" class="justify-content-center" style="width:70%" disabled></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <span class="pull-right">
                                    <script>
                                        function randPass(length) {
                                            return (Math.random().toString(36).substr(2, length));
                                        }
                                    </script>
                                    <form method="POST" action="{{ route('deaneries.teacher_resetPass', ['id' => $teacher->id]) }}">
                                        @csrf
                                        {{method_field('PATCH')}}
                                        <input type='hidden' id="new" name='new'/>
                                        <button type="button" class="btn btn-primary" onclick="document.getElementById('newpassword').value = randPass(8); document.getElementById('reset').disabled = false; document.getElementById('new').value = document.getElementById('newpassword').value">Randomize</button>
                                        <input type="submit" disabled id="reset" name="reset" class="btn btn-success" value="Reset">
                                    </form>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
