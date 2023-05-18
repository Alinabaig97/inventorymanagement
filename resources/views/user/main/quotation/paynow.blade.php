@extends('user.auth.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="fw-bold py-3 mb-4 ">PayMent</h1>
                </div>
                <form action="{{ route('payment.store') }}" method="post">
                    @csrf
                    @error('throttle')
                        <strong>{{ $message }}</strong>
                    @enderror
                    @if ($errors)
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{ $error }}</p>
                        @endforeach
                    @endif
                    <input type="hidden" class="form-control" id="qouataion_id" name="qouataion_id"
                        value="{{ $quotation->id }}">

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="{{ $quotation->customer->name }}" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Email</label>
                        <input type="text" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="name">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>
                    <div class="form-group mt-3">
                        <label for="expiry_date">Price</label>
                        <input type="text" class="form-control" id="price" name="price"
                            value="{{ $quotation->total_price }}" readonly>
                    </div>
                    @php
                        $totalQty = 0;
                    @endphp

                    @foreach ($quotations as $quotation)
                        <input type="hidden" class="form-control" id="qty" value="{{ $quotation->product_qty }}">
                        @php
                            $totalQty += $quotation->product_qty;
                        @endphp
                    @endforeach

                    <div class="form-group mt-3">

                        <input type="hidden" class="form-control" name="qty" id="totalQty" value="{{ $totalQty }}" readonly>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Pay</button>
                </form>

            </div>
        </main>

    </div>
@endsection
