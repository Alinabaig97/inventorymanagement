@extends('user.auth.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4 mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4">Customer's Details</h1>
                <a href="{{ route('customers.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add Customer</a>
            </div>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Phone</th>
                        <th>Amount</th>
                        <th>Action</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $customer->id }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email }}</td>
                            <td>{{ $customer->address }}</td>
                            <td>{{ $customer->phone }}</td>
                            <td>{{ $customer->amount }}</td>
                            <td><a href="{{ route('customers.edit', $customer->id) }}"><button
                                        class="btn btn-primary">Edit</button></a></td>
                            <td>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
