@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4 mt-3">

            <form action="{{ route('transactionCategory.update',$category->id) }}" method="post">
                @method('PUT')
                @csrf
                @error('throttle')
                    <strong>{{ $message }}</strong>
                @enderror
                @if ($errors)
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                @endif
                <div class="row">
                    <div class="col-md-6">
                        <label for="name">Transaction Name:</label> <br> <br>

                        <input type="text" class="form-control" name="name" value="{{$category->name}}" id="name" placeholder="Write here">
                    </div>
                    <div class="col-md-6">
                        <label for="name">Transaction Description:</label> <br> <br>

                        <textarea class="form-control" name="description"  placeholder="Write here">{{$category->description}}</textarea>

                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-success mt-2" type="submit">Update</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    </div>
@endsection
