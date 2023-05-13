@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 mt-3 "> {{ $customer->name }} Order's Details </h1>
            </div>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Product Name</th>
                        <th>UnitPrice</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Total</th>
                        <th>Bill_number</th>
                        <th>Order_id</th>

                    </tr>
                </thead>
                <tbody>
                    @php
                        $total = 0;
                    @endphp

                    @foreach ($details as $detail)
                        <tr>
                            <td>{{ $detail->product->name }}</td>
                            <td>{{ $detail->unit_price }}</td>
                            <td>{{ $detail->quantity }}</td>
                            <td>{{ $detail->discount }}</td>
                            <td>{{ $detail->total }}</td>
                            <td>{{ $detail->bill_number }}</td>
                            <td>{{ $detail->order_id }}</td>
                        </tr>
                        @php
                            $total += $detail->total;
                        @endphp
                    @endforeach

                </tbody>

            </table>
            <tfoot>
                <tr>
                    <td> <b> Total Amount: </b> Rs.{{$customer->amount - $total}}</td>
                </tr>
            </tfoot>
        </div>
    </div>
    </div>
@endsection
