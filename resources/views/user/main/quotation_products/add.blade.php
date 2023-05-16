@extends('user.auth.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="fw-bold py-3 mb-4 ">Quotation Products</h1>
                </div>
                <form action="{{route('quotationproducts.store')}}" method="post">
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
                            <label for="">Quotation ID</label>
                            <input type="text" name="quotation_id" class="form-control" id="">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="">Product ID</label>
                            <select class="form-control" name="product_id" id="product_id">
                                <option selected disabled>Select Customer</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Product Quantity </label>
                            <input type="text" name="product_qty" class="form-control mt-3" id="">
                        </div>
                        
                        <div class="col-md-6">
                            <label for="">Product Price</label>
                            <input type="text" name="product_price" class="form-control mt-3" id="">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Customer ID</label>
                            <select class="form-control mt-3" name="customer_id" id="customer_id">
                                <option selected disabled>Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        
                    
                        <div class="row">
                            <div class="col-md-4 mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>
                    </div>
                </form>
            </div>
        </main>

    </div>
@endsection
