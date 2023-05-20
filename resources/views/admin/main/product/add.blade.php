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
                <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
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
                                <input type="text" class="form-control" id="" name="name"
                                    placeholder="Enter name">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputRole">Description</label>
                                <textarea type="text" class="form-control" id="" name="description" placeholder="Enter description"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">Unit</label>
                                <input type="text" class="form-control" id="inputame" name="unit"
                                    placeholder="Enter unit">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputRole">Price</label>
                                <input type="text" class="form-control" id="" name="price"
                                    placeholder="Enter price">

                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">Quantity</label>
                                <input type="text" class="form-control" id="" name="quantity"
                                    placeholder="Enter Quantity">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputRole">Caterogy_id</label>
                                <select class="form-control" name="category_id" id="">
                                    <option selected disabled>Select Category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">Select Images</label>
                                <input type="file" name="images[]" id="files" multiple accept="image/png, image/jpeg, image/jpg" class="form-control">
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
</script>
