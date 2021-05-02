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

                        <form action="{{route('product.update',$product->id)}}" method="post" enctype="multipart/form-data">
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
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="image" class="col-form-label col-sm-4">Product Image</label>
                                    <input type="file" onchange="showPrImage(this)" accept='image/*' name="image" class="form-control" id="image" >
                                    <span class="float-left">
                                        <img id="pr_thumbnil" style="width:100px;" src="" alt=""/>
                                    </span>
                                </div>


                            </div>
                            <button class="btn btn-success" type="submit">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('js')
    <script>
        /*
        * Preview Upload Image
        */
        function showPrImage(fileInput) {
            var files = fileInput.files;
            for (var i = 0; i < files.length; i++) {
                var file = files[i];
                var imageType = /image.*/;
                if (!file.type.match(imageType)) {
                    continue;
                }
                var img = document.getElementById("pr_thumbnil");
                img.file = file;
                var reader = new FileReader();
                reader.onload = (function (aImg) {
                    return function (e) {
                        aImg.src = e.target.result;
                    };
                })(img);
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
