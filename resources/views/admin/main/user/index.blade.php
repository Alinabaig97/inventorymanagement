@extends('admin.main.layout.master') @section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4 mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">User Detail's </h1> 
                <a href="{{ route('user.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add User</a>
            </div>
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a href="{{ route('user.edit', $user->id) }}"><button
                                        class="btn btn-success">Edit</button></a> </td>
                            <form action="{{ route('user.destroy', $user->id) }}" method="post"> @method('DELETE')
                                @csrf <td><button class="btn btn-danger">Delete</button> </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
