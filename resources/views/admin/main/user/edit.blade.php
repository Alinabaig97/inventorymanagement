@extends('admin.main.layout.master')
@section('content')
<div id="layoutSidenav_content">

    <div class="container-fluid px-4 mt-3">
        <div class="d-flex align-items-center justify-content-between">
            <h1 class="fw-bold py-3 mb-4 ">Edit Form </h1>
            {{-- <a href="{{ route('customer.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add User</a> --}}
        </div>
        <form action="{{ route('user.update',$user->id) }}" method="post">
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
            <input type="text" name="name" value="{{$user->name}}" class="form-control" placeholder="Enter Your Name">
            <input type="email" name="email" value="{{$user->email}}" class="form-control mt-4" placeholder="Enter Your email">
            <input type="password" name="password" value="{{$user->password}}" class="form-control mt-4" placeholder="Enter Your password">
            <button type="submit" class="btn btn-primary  mt-4">Update</button>
        </form>
    </div>
</div>

@endsection