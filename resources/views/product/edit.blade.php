@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row-justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Product Creation
                    </div>


                    <div class="card-body">

                        <form action="{{route('product.update',$product->id)}}" method="post">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <input type="text" name="name" value="{{$product->name}}" class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Details </label>
                                <textarea name="details"  class="form-control @error('details') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3">{{$product->details}}</textarea>
                                @error('details')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-success" type="submit">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
