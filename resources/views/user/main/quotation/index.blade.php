@extends('user.auth.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="fw-bold py-3 mb-4 ">Quotation</h1>
                    <a href="{{ route('quotation.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add Quotation</a>
                </div>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>date</th>
                            <th>customer_id</th>
                            <th>order_tax</th>
                            <th>discount</th>
                            <th>shipping</th>
                            <th>status</th>
                            <th>note</th>
                            <th>total_price</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations as $quotation)
                            <tr>
                                <td>{{ $quotation->date }}</td>
                                <td>{{ $quotation->customer_id }}</td>
                                <td>{{ $quotation->order_tax }}</td>
                                <td>{{ $quotation->discount }}</td>
                                <td>{{ $quotation->shipping }}</td>
                                <td>{{ $quotation->status }}</td>
                                <td>{{ $quotation->note }}</td>
                                <td>{{ $quotation->total_price }}</td>
                                <td>
    
                                    <a href=""> <button class="btn btn-primary"
                                            type="submit"> Edit</button></a>
                                </td>
                                <form action="" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <td>
                                        <button class="btn btn-danger" type="submit"> Delete</button>
                                    </td>
    
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </main>

    </div>
@endsection
