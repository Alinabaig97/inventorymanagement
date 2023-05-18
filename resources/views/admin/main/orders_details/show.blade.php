@extends('admin.main.layout.master')
@section('content')
<div id="layoutSidenav_content">
<div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="fw-bold py-3 mb-4 ">View Details</h1>
    </div>
    <div class="card">
        <div class="card-header">{{$details->product->name}} | {{$details->bill_number}}</div>
        <div class="card-body">
            <p><h6> Quantity: {{ $details->quantity }}</h6></p>
            <p><h6>Discount: {{$details->discount  }}</h6></p>
            <p><h6>Total: {{ $details->total }}</h6></p>
            <p><h6>Product Id: {{ $details->product_id }}</h6></p>
            <p><h6>Order Id: {{ $details->order_id }}</h6></p>
            <p> <h6> Status:</h6></p>
            <form action="{{route('update.status',$details->id)}}" method="post">
                @csrf
            <select id="status" name="status" class="form-control" style="width: 30%" >
              <option value="1" {{ $details->status == 1 ? 'selected' : '' }}>Active</option>
              <option value="0" {{ $details->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select><br><br>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        </div>
    </div>
    
</div>
</div>
</div>
@endsection