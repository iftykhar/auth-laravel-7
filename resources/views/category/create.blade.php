@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-8 mx-auto">

                <div class="row">
                    <div class="col-md-6 border-left ">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h3>Category creating</h3>
                                <a href="{{route('product.create')}}" class="btn btn-success">Create Product</a>
                            </div>
                            <div class="card-body">
                                <form action="{{route('category.store')}}" method="post">
                                    @csrf
                                    <label for="name">Category Nmae</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" valu=" {{old('name')}} ">
                                    @error('name')
                                    <p class="alert alert-danger">{{$message}}</p>
                                    @enderror
                                    <div class="my-2 d-flex justify-content-center">
                                        <button class="btn btn-success" type="submit">Create</button>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 border-left border-right">
                        @if(count($categories) > 0)

                            <div class="card">
                                <div class="card-header">
                                    <h3>All Categories</h3>
                                </div>
                                <div class="card-body">
                                    <table class="table">
                                        @foreach($categories as $item)
                                            <tr>
                                                <td>{{$item->id}}</td>
                                                <td>{{$item->name}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        @else
                            <p class="alert alert-danger">There is No Categoris , User</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
