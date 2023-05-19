@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">View Details</h1>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>Customer Name:</th>
                        <th>Product Name:</th>
                        <th> Quotation ID:</th>
                        <th>Product Qty: </th>
                        <th>Product Price:</th>
                    </tr>
                </thead>
                @foreach ($quotations as $quotation)
                <tbody>
                        <tr>
                            <td scope="row"> {!! !empty($quotation->customer) ? $quotation->customer->name : 'N/A' !!}</td>
                            <td>{{ $quotation->product->name }}</td>
                            <td>{{ $quotation->quotation_id }}</td>
                            <td>{{ $quotation->product_qty }}</td>
                            <td>{{ $quotation->product_price }}</td>
                        </tr>
                </tbody>
            @endforeach
            </table>
        </div>
    </div>
@endsection
