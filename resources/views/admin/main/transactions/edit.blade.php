@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4 mt-3">

            <form action="{{ route('transactions.update',$transation->id) }}" method="post">
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
                        <label for="name"> Name:</label> 

                        <input type="text" class="form-control" value="{{$transation->name}}" name="name" id="name" placeholder="Write here">
                    </div>
                    <div class="col-md-6">
                        <label for="name">Price:</label> 

                        <input class="form-control" name="price" placeholder="Write here" value="{{$transation->price}}">

                    </div>
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <label for="name">Date:</label> 
                           <input type="date" class="form-control" name="date" id="date" value="{{$transation->date}}">
                              

                        </div>
                        <div class="col-md-6  mt-3">
                            <label for="name">transation id:</label>
                            <select class="form-control" name="transation_id" id="transation_id">
                            <option selected disabled>Select transation</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"{{ $category->id == $transation->category_id ? 'selected' : '' }}>{{$category->name}} </option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <button class="btn btn-success mt-2" type="submit">Submit</button>
                    </div>
                </div>
        </div>
        </form>
    </div>
    </div>
    </div>
@endsection
