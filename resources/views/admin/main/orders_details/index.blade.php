@extends('admin.main.layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid px-4" >
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fw-bold py-3 mb-4 ">Order's Details </h1>
            <a href="{{ route('orders_details.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> New order</a>
        </div>
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>Product_id</th>
                    <th>Order_id</th>
                    <th>Bill_number</th>
                    <th>UnitPrice</th>
                    <th>Quantity</th>
                    <th>Discount</th>
                    <th>Total</th>
                 
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($details as $detail)
                    <tr>
                        <td>{{  $detail->product->name  }}</td>
                        <td>{{ $detail->order_id }}</td>
                        <td>{{ $detail->bill_number }}</td>
                        <td>{{ $detail->unit_price }}</td>
                        <td>{{ $detail->quantity }}</td>
                        <td>{{ $detail->discount }}</td>
                        <td>{{ $detail->total }}</td>
                        
                        <td>
                            @if ($detail->status == '1')
                                <span class="text text-success"> Active </span>
                            @else
                                <span class="text text-danger"> Inactive </span>
                            @endif
                        </td>

                        <td>
                            <a href="{{ route('orders_details.show', $detail->id) }}">
                                <button class="btn btn-secondary">show</button> </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
    </div>
@endsection
