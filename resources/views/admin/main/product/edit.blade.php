<style>
    input[type="file"] {
    display: block;
    }
    .imageThumb {
    max-height: 75px;
    border: 2px solid #1371A0;
    padding: 1px;
    cursor: pointer;
    }
    .pip {
    display: inline-block;
    margin: 10px 10px 0 0;
    }
    .remove {
        display: block;
        background: #64B9D1;
        border: 1px solid #1371A0;
        color: white;
        text-align: center;
        cursor: pointer;
    }
    .remove:hover {
    background: white;
    color: #1371A0;
    }
</style>
@extends('admin.main.layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid px-4 mt-3">
        <div class="lign-items-center justify-content-between">
            <form method="post" action="{{ route('product.update',$products->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                @error('throttle')
                    <strong>{{ $message }}</strong>
                @enderror
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Name</label>
                            <input type="text" class="form-control" value="{{$products->name}}" id="inputName" name="name"
                                placeholder="Enter name">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputRole">Description</label>
                            <textarea type="text" class="form-control" value="" id="inputName" name="description" placeholder="Enter description">{{$products->description}}</textarea>

                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Unit</label>
                            <input type="text" class="form-control" value="{{$products->unit}}" id="inputName" name="unit"
                                placeholder="Enter unit">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputRole">Price</label>
                            <input type="text" class="form-control" value="{{$products->price}}" id="inputName" name="price"
                                placeholder="Enter price">

                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Quantity</label>
                            <input type="text" class="form-control" value="{{$products->quantity}}" id="inputName" name="quantity"
                                placeholder="Enter Quantity">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputRole">Caterogy_id</label>
                            <select class="form-control" name="category_id"  id="inputRole">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{$category->id == $products->category_id ? 'selected' : ''}}>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputRole">Image</label>
                            <input type="file" name="images[]" id="files" multiple accept="image/png, image/jpeg, image/jpg" class="form-control">
                        </div>
                        
                        <div class="row mt-3">
                            @foreach ($images as $image)
                                <div class="col-md-3">
                                    <img src="{{ asset('uploads/product/gallery/' . $image->images) }}" alt="Product Image" class="img-fluid imageGallery{{ $image->id }}">
                                    <span class="remove btnGallery{{ $image->id }}" data-image-id="{{ $image->id }}">Remove image</span>
                                </div>
                            @endforeach
                        </div>
                        
                    </div>
                </div>
             
        </div>
        <button type="submit" class="btn btn-primary mt-3">Submit</button>
        </form>
    </div>
    </div>
    </div>
</div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
    $(document).ready(function() {
            if (window.File && window.FileList && window.FileReader) {
                $("#files").on("change", function(e) {
                var files = e.target.files,
                    filesLength = files.length;
                for (var i = 0; i < filesLength; i++) {
                    var f = files[i]
                    var fileReader = new FileReader();
                    fileReader.onload = (function(e) {
                    var file = e.target;
                    $("<span class=\"pip\">" +
                        "<img class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
                        "<br/><span class=\"remove\">Remove image</span>" +
                        "</span>").insertAfter("#files");
                    $(".remove").click(function(){
                        $(this).parent(".pip").remove();
                    });
                    });
                    fileReader.readAsDataURL(f);
                }
                });
            } else {
                alert("Your browser doesn't support to File API")
            }
        });
    $(document).ready(function() {
        $('.remove').on('click', function() {
            var imageId = $(this).attr('data-image-id'); // Get the image ID from the data attribute
            $.ajax({
                url: "{{ route('delete.image') }}",
                method: 'get',
                data: {
                    image_id: imageId
                },
                success: function(response) {
                    
                    $('.imageGallery'+imageId).remove();
                    $('.btnGallery'+imageId).remove();
                    
                }
            });
        });
    });

</script>
