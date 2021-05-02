@extends('layouts.app')
@section('title')
    @if(count(array($productData)) > 0)
        {{ $productData->name }} |
    @endif
    {{--    how show title with product name--}}
@endsection
@section('content')
    <div class="d-flex justify-content-center py-5">
        <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $productData->name }}</h2>
                    </div>
                    <div class="card-body">
                        <div class="card-title">

                            <img src="{{asset($productData->image)}}" alt="Image" style="width: 500px; height: 500px">
                        </div>
                        <div class="">
                            <span class=""><strong>Category:</strong></span> {{$productData->category_id}}
                        </div>
                        <div class="">
                            <span class=""><strong>Details:</strong></span> {{ $productData->details }}
                        </div>
                    </div>
                   <div class="d-flex justify-content-center">
                       <a href="{{route('product.index')}}" class="btn btn-primary text-decoration-none">Go Back</a>
                   </div>
                </div>
        </div>
    </div>
@endsection
