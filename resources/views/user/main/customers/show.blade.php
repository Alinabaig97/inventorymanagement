
@extends('user.auth.layout.master')
@section('content')
    <div id="layoutSidenav_content">
    
        <div class="container-fluid px-4 mt-3">
            <div class="lign-items-center justify-content-between">
                <form method="POST" action="{{ route('customers.store') }}">
                    @csrf
                    @error('throttle')
                    <strong>{{ $message }}</strong>
                @enderror
                @if($errors)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{$error}}</p>
                    @endforeach
                @endif
                
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input id="name" type="text" class="form-control " name="name" required>
                       
                    </div>
                
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control mt-2" name="email" required>
                    </div>
                
                    <div class="form-group">
                        <label for="address">Address</label>
                        <input id="address" type="text" class="form-control mt-2" name="address" required>
                    </div>
                
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <input id="phone" type="tel" class="form-control mt-2" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="amount">Total Amount</label>
                        <input id="amount" type="text" class="form-control mt-2" name="amount" required>
                    </div>
                    
                
                    <button type="submit" class="btn btn-primary mt-3">Submit</button>

                </form>
                
            </div>
        </div>
    </div>
@endsection
