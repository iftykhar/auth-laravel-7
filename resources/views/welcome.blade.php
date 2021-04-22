@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="">
            <div class="row ">
                <div class="col-md-8 mx-auto d-flex justify-content-between">
                    <div class="font-weight-bold"><h3>Products</h3></div>
                    @auth
                        <a class="btn btn-success" href="{{route('product.create')}}">Create</a>
                    @endauth
                </div>
            </div>
            <hr>
        </div>
        <div class="d-flex align-content-start flex-wrap">
            <div class="row ">
                @foreach($product as $item)
                    <div class="card mx-3 my-3" style="width: 282px; max-height: 500px">
                        <div class="card-header">
                            <img src="{{asset($item->image)}}" alt="product" style="height:200px;weight:90px">
                        </div>
                        <div class="card-body">
                            <div class="d-flex justify-content-between">
                                @auth
                                    <a href="{{route('product.edit',$item->id)}}" class="btn btn-primary text-decoration-none">Edit</a>
                                @endauth
                                <a href="{{route('product.show',$item->id)}}" class="btn btn-secondary text-decoration-none">Show</a>
                                @auth
                                    <form onsubmit="return confirm('Are You Sure, Delete this Product?')" action="{{route('product.destroy', $item->id)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"> Delete </button>
                                    </form>
                                @endauth
                            </div>
                            <div class="mx-2 my-2 font-weight-bold">
                                {{$item->name}}
                            </div>
                            <div class="mx-2 my2">
                                <span><u>Category:</u></span>
                                @foreach($category as $data)
                                    @if($data->id == $item->category_id)
                                        {{$data->name}}
                                    @endif
                                @endforeach

                            </div>
                            <div class="mx-2 my-2">
                                {{$item->details}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
