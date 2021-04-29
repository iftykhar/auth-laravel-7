@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="">
            <h3>Users Name and Id</h3>
        </div>
        <hr>
        <div class="card">
            <div class="card-header">
                <h4><u>User's Name</u></h4>{{$user->name}}

            </div>
            <div class="card-body">
                <h4><u>User's E-Mail</u></h4>{{$user->email}}
            </div>
        </div>
    </div>
    @endsection
