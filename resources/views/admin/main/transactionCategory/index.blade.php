@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 "> Transaction's Category </h1>
                <a href="{{route('transactionCategory.create')}}" class="btn btn-primary"><i class="bx bx-plus"></i> New Category</a>
            </div>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $transaction)      
                   <tr>
                    <td>{{$transaction->id}}</td>
                    <td>{{$transaction->name}}</td>
                    <td>{{$transaction->description}}</td>   
                   <td><a href="{{route('transactionCategory.edit',$transaction->id)}}"><button class="btn btn-success" type="submit">Edit</button></a></td>
                   <form action="{{ route('transactionCategory.destroy', $transaction->id) }}" method="post">
                    @method('DELETE')
                    @csrf
                    <td>
                        <button class="btn btn-danger" type="submit"> Delete</button>
                    </td>

                </form>
                </tr>

                   @endforeach

                </tbody>
            </table>
        </div>
    </div>
    </div>
@endsection
