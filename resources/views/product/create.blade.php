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

                        <form action="{{route('product.store')}}" method="post">
                            @csrf
                            <label class="sr-only" for="image">Image</label>
                            <input type="hidden" name="image" id="image" value="image">
                            <div class="mb-3">
                                <label for="category" >Category</label><a class="btn btn-success text-capitalize" href="{{route('category.create')}}">new category</a>
                                <select class="form-control" name="category_id" id="category">
                                    @foreach($categories as $item)
                                        <option value="{{$item->id}}"> {{$item->name}} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlInput1" class="form-label">Product Name</label>
                                <input type="text" name="name" value="{{ old('name') }} " class="form-control @error('name') is-invalid @enderror" id="exampleFormControlInput1" >
                                @error('name')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="exampleFormControlTextarea1" class="form-label">Details </label>
                                <textarea name="details" class="form-control  @error('details') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3"></textarea>
                                @error('details')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-primary" type="submit" value="Save">Save</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
