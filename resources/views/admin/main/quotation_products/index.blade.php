@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4 mt-3">
                <div class="d-flex align-items-center justify-content-between">
                    <h1 class="fw-bold py-3 mb-4 ">Quotation</h1>
                    {{-- <a href="{{ route('quotationproducts.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add Quotation</a> --}}
                </div>
                <table class="table table-striped table-inverse table-responsive">
                    <thead class="thead-inverse">
                        <tr>
                            <th>Quotation ID</th>
                            <th>Product ID</th>
                            <th>Product Qty</th>
                            <th>Product Price</th>
                            <th>Customer ID</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations as $quotation)
                            <tr>
                                <td>{{ $quotation->quotation_id }}</td>
                                <td>{{ $quotation->product_id }}</td>
                                <td>{{ $quotation->product_qty }}</td>
                                <td>{{ $quotation->product_price }}</td>
                                <td>{{ $quotation->customer_id }}</td>
                                 <td>
                                    <td>
                                        <select id="status" name="status" class="form-control">
                                            <option value="1" {{ $quotation->status == 1 ? 'selected' : '' }}>Active</option>
                                            <option value="0" {{ $quotation->status == 0 ? 'selected' : '' }}>Inactive</option>
                                          </select>
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
