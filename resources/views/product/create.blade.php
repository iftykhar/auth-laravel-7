@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="row-justify-content-center">
            <div class="col-md-12">
                <div class="card ">
                    <div class="card-header d-flex justify-content-between">
                        <div>
                            <h2> Product Creation</h2>
                        </div>
                        <div>
                            <a class="btn btn-outline-primary" href="">PDF</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="sr-only" for="image">Image</label>
                            <input type="hidden" name="image" id="image" value="image">
                            <div class="mb-3">
                                <label for="category" >Category</label><a class="btn btn-success text-capitalize" href="{{route('category.create')}}">new category</a>
                                @if(count($categories) > 0 )
                                    <select class="form-control" name="category_id" id="category" required>
                                        @foreach($categories as $item)
                                            <option value="{{$item->id}}"> {{$item->name}} </option>
                                        @endforeach
                                    </select>
                                @else
                                    <select class="form-control" name="category_id" id="category" required disabled>
                                        <option value="">There is no categories</option>
                                    </select>
                                @endif
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
                            <div class="mb-3">
                                <label for="image" class="col-form-label col-sm-4">Product Image</label>
                                <div class="col-sm-8">
                                    <input type="file" name="image" class="form-control" id="image" >

                                </div>

                            </div>
                            @if(count($categories) > 0)
                                <button class="btn btn-primary" type="submit" value="Save">Save</button>
                            @else
                                <button class="btn btn-primary" type="submit" value="Save" disabled>Save</button>
                            @endif
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
