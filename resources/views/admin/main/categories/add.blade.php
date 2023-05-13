@extends('admin.main.layout.master')
@section('content')
<div id="layoutSidenav_content">
    <div class="container-fluid px-4 mt-3" >

        <form action="{{ route('categories.store') }}" method="post">
            @csrf
            @error('throttle')
                <strong>{{ $message }}</strong>
            @enderror
            @if ($errors)
                @foreach ($errors->all() as $error)
                    <p class="alert alert-danger">{{ $error }}</p>
                @endforeach
            @endif
            <label for="name">Product Name:</label> <br> <br>

            <input type="text" class="form-control" name="name" id="name"  placeholder="Write here">

            <button class="btn btn-success mt-2" type="submit">Submit</button>
        </form>
    </div>
    </div>
    </div>
@endsection
