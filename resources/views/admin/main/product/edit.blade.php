@extends('admin.main.layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid px-4 mt-3">
        <div class="lign-items-center justify-content-between">
            <form method="post" action="{{ route('product.update',$products->id) }}">
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
                        <label for="inputRole">Customer </label>
                        <select class="form-control" name="customers" id="">
                            <option selected disabled>Select Customer</option>
                            @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}"{{ $customer->id == $products->customers ? 'selected' : '' }}>{{$customer->name}} </option>
                            @endforeach
                        </select>
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
