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
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">
                            @error('name') {{$message}} @enderror
                            <lable for="email">Email:</lable>
                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" id="email">
                            @error('email') {{$message}} @enderror
                            <lable for="pass">Password:</lable>
                            <input class="form-control" type="password" name="password" id="pass">
                            <lable for="pass2">Repete Password:</lable>
                            <input class="form-control" type="password" name="password_confirmation" id="pass2">

                            <button type="submit" class="btn btn-outline-primary mx-auto my-3"> Save Me</button>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        User Index
                    </div>
                    <div class="card-body d-flex justify-content-between">
                        <table class="table">


                                <tr>
                                    <td><strong>User Name</strong></td>
                                    <td><strong>User E-Mail</strong></td>
                                    <td colspan="3"><strong>Actions</strong></td>
                                </tr>

                            @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="{{route('user.show',$user->id)}}" class="btn btn-dark text-white">Show</a></td>
                                <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-primary text-white">Edit</a></td>
                                <td>
                                    <form action="{{route('user.destroy',$user->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
