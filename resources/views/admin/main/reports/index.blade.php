@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">TRANSACTION'S Details </h1>
            </div>
            <!-- Display the form to allow the user to input the date -->
            <form method="GET" action="{{ url('reportsfilter') }}">
                <label for="date">Filter by date:</label>
                <input type="date" id="date" name="date">
                <button type="submit">Filter</button>
            </form>

            <!-- Display the table of order details -->
            <table class="table table-striped table-inverse table-responsive mt-4">
                <thead class="thead-inverse">
                    <tr>
                        <th> Name</th>
                        <th>Category Name</th>
                        <th>Date</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                @endphp

                    @foreach ($transations as $transation)
                        <tr>
                            <td>{{ $transation->name }}</td>
                            <td>{!! !empty($transation->category->name) ? $transation->category->name : 'N/A'!!}</td>
                            <td>{{ $transation->date }}</td>
                            <td>{{ $transation->price }}</td>

                        </tr>
                        @php
                        $total += $transation->price;
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
