@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">SALE's Details </h1>
            </div>
            <!-- Display the form to allow the user to input the date -->
            <form method="GET" action="{{ url('/filter') }}">
                <label for="date">Filter by date:</label>
                <input type="date" id="date" name="date">
                <button type="submit">Filter</button>
            </form>

            <!-- Display the table of order details -->
            <table class="table table-striped table-inverse table-responsive mt-4">
                <thead class="thead-inverse">
                    <tr>
                        <th>Product Name</th>
                        <th>UnitPrice</th>
                        <th>Quantity</th>
                        <th>Discount</th>
                        <th>Total</th>

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

                        </tr>
                        @php
                        $total += $detail->total;
                    @endphp
                    @endforeach
                </tbody>
            </table>
            <tfoot>
                <tr>
                    <td> <b> Total Amount: </b>Rs.{{ $total}}</td>
                </tr>
            </tfoot>

        </div>
    </div>
    </div>
@endsection
