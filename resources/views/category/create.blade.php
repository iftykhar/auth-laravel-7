@extends('layouts.app')
@section('content')
    <div class="content">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <a href="{{route('product.create')}}" class="btn btn-success">Create Product</a>
                <div class="row">
                    <div class="col-md-6">
                        <form action="{{route('category.store')}}" method="post">
                            @csrf
                            <label for="name">Category Nmae</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" valu=" {{old('name')}} ">
                            @error('name')
                            <p class="alert alert-danger">{{$message}}</p>
                            @enderror
                            <button class="btn btn-success" type="submit">Create</button>
                        </form>
                    </div>
                    <div class="col-md-6">
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
