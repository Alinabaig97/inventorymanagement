@extends('user.auth.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4 mt-3">
            <div class="lign-items-center justify-content-between">
                <form method="POST" action="{{ route('customers.update', $customer->id) }}">
                    @csrf
                    @method('PUT')
                    @error('throttle')
                    <strong>{{ $message }}</strong>
                    @enderror
                    @if($errors)
                        @foreach ($errors->all() as $error)
                            <p class="alert alert-danger">{{$error}}</p>
                        @endforeach
                    @endif
                    <input type="hidden" name="id" value="{{ $customer->id }}">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control" name="name" value="{{ $customer->name }}" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" value="{{ $customer->email }}" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" type="text" class="form-control" name="address" value="{{ $customer->address }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" type="tel" class="form-control" name="phone" value="{{ $customer->phone }}" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Total Amount</label>
                        <input id="amount" type="text" class="form-control mt-2" value="{{ $customer->amount }}"  name="amount" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
