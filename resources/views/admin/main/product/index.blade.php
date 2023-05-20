@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">Products Page </h1>
                <a href="{{ route('product.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add Product</a>
            </div>
            <table class="table table-striped table-inverse table-responsive mb-5 pb-5" >
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Unit</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Supplier</th>
                        <th>Category</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $product)
                        <tr>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->unit }}</td>
                            <td>{{ $product->price }}</td>
                            <td>
                                @if ($product->quantity == 0)
                                    <span class="text text-danger"> Out Of Stock</span>
                                @else
                                    {{ $product->quantity }}
                                @endif
                            </td>
                            <td>{{ $product->suppliers->name }}</td>
                            <td>{{ $product->categeory->name }}</td>
                            <td><a href="{{ route('product.edit', $product->id) }}"><button
                                        class="btn btn-success">Edit</button></a> </td>
                            <form action="{{ route('product.destroy', $product->id) }}" method="post">
                                @method('DELETE')
                                @csrf
                                <td><button class="btn btn-danger">Delete</button>
                                </td>

                            </form>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
