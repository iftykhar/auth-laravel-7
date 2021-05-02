@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3>Employee</h3>
                    </div>
                    <div class="card-body ">
                        <form action="{{route('employee.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <lable for="name">Enter Employee Name::</lable>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name">
                            @error('name') <p class="alert alert-danger">{{$message}}</p> @enderror

                            <lable for="file">Upload File::</lable>
                            <input class="form-control" type="file" name="file" id="file">
                            @error('file') <p class="alert alert-danger">{{$message}}</p> @enderror

                            <div class="d-flex justify-content-center">
                                <button type="submit" class="btn btn-primary mx-auto my-3">Save</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <p>Pdf Reader</p>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <td><strong>Employee Name</strong></td>
                                <td><strong>Details File</strong></td>
                                <td colspan="3" class="font-weight-bold">Actions</td>
                            </tr>
                            @foreach($employees as $item)
                            <tr>
                                <td>{{$item->name}}</td>
                                <td>{{$item->file}}</td>
                                <td><a href="{!! url($item->file) !!}" target="_blank" class="btn btn-danger"> Show PDF</a></td>

                            </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
