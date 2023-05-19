@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4 mt-3">
            <div class="lign-items-center justify-content-between">
                <form method="post" action="{{ route('product.store') }}">
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
                        {{-- <div class="row-md-6 mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="inputRole">Customer </label>
                                    <select class="form-control" name="customers" id="">
                                        <option selected disabled>Select Customer</option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div> --}}
                        {{-- 
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputRole">Status</label>
                            <select class="form-control" id="inputRole">
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                        </div>
                    </div> --}}
                    </div>
                    {{-- <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="inputName">Supplier_id	</label>
                            <input type="text" class="form-control" id="inputName" placeholder="Enter Supplier_id">
                        </div>
                    </div> --}}


            </div>


            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
