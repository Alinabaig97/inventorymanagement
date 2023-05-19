@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">View Payments</h1>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th> Name:</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th>Price:</th>
                        <th>Quantity</th>
                        <th>Status</th>
                    </tr>
                </thead>
                @foreach ($pays as $pay)
                <tbody>
                        <tr>
                            <td scope="row"> {{$pay->name }}</td>
                            <td>{{$pay->email }}</td>
                            <td>{{$pay->address }}</td>
                            <td>{{$pay->price }}</td>
                            <td>{{$pay->qty }}</td>
                            <td>
                                <form action="{{ route('status', $pay->id) }}" method="POST"
                                    id="update-status-form">
                                    @csrf
                                    <select id="status" name="status" data-id="{{ $pay->id }}"
                                        class="form-control text text-primary status">
                                        <option value="1" {{ $pay->status == 1 ? 'selected' : '' }}
                                            class="text text-success"> Approved</option>
                                        <option value="0" {{ $pay->status == 0 ? 'selected' : '' }}
                                            class="text text-danger">Reject</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                </tbody> 
             @endforeach
            </table>
        </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        $('.status').change(function() {
            var status = $(this).find(":selected").val();
            var id = $(this).attr('data-id');
            var url = "{{ route('status', ':id') }}";
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