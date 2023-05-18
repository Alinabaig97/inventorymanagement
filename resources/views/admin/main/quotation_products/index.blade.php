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
                            <th>Customer Name</th>
                            <th>Order Tax</th>
                            <th>Discount</th>
                            <th>Shipping</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>View</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($quotations as $quotation)
                            <tr>
                                <td>{{ $quotation->customer->name }}</td>
                                <td>{{ $quotation->order_tax }}</td>
                                <td>{{ $quotation->discount }}</td>
                                <td>{{ $quotation->shipping }}</td>

                                <td>{{ $quotation->total_price }}</td>
                                <td>
                                    <form action="{{ route('updateQouataionstatus', $quotation->id) }}" method="POST"
                                        id="update-status-form">
                                        @csrf
                                        <select id="status" name="status" data-id="{{ $quotation->id }}"
                                            class="form-control text text-primary status">
                                            <option value="1" {{ $quotation->status == 1 ? 'selected' : '' }}
                                                class="text text-success"> Approved</option>
                                            <option value="0" {{ $quotation->status == 0 ? 'selected' : '' }}
                                                class="text text-danger">Pending...</option>
                                        </select>
                                    </form>

                                </td>
                                <td> <a href="{{ route('view', $quotation->id) }}"> <button type="submit"
                                            class="btn btn-secondary">
                                            View</button></a> </td>
                                </form>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </main>

    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.status').change(function() {
            var status = $(this).find(":selected").val();
            var id = $(this).attr('data-id');
            var url = "{{ route('updateQouataionstatus', ':id') }}";
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                method: 'POST',
                data: {
                    _token: $('#update-status-form [name="_token"]').val(),
                    status: status,
                },
                success: function(response) {
                    // console.log(response);
                   
                },
            });
        });
    });
</script>
