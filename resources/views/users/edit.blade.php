@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="">
            <h3>Register New User Here</h3>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="card">
                    <div class="card-header">
                        <p><strong>Registration Form</strong></p>
                    </div>
                    <div class="card-body">
                        <form action="{{route('user.store')}}" method="post" >
                            @csrf
                            <lable for="name">User Name:</lable>
                            <input class="form-control @error('name') is-invalid @enderror" value="{{$user->name}}" type="text" name="name" id="name">
                            @error('name') {{$message}} @enderror
                            <lable for="email">Email:</lable>
                            <input class="form-control" type="email" value="{{$user->email}}" name="email" id="email">
                            <lable for="pass">Old Password:</lable>
                            <input class="form-control" type="password"  name="password" id="pass">
                            <lable for="pass2">New Password:</lable>
                            <input class="form-control" type="password" name="password_confirmation" id="pass2">

                            <button type="submit" class="btn btn-outline-primary mx-auto my-3"> Save Me</button>
                        </form>
                    </div>
                </div>

            </div>
                </div>
            </div>
        </div>
    </div>
@endsection
