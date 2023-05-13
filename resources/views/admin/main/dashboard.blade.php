@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Welcome  {{ $admin->name }}</h1>
                <div class="card bg-info" style="width: 20%">
                    <div class="card-body">
                      <h5 class="card-title">Total Users :</h5>
                      <p class="card-text">{{ $totalUsers }}</p>
                    </div>
                  </div>
            </div>
        </main>
     
    </div>
@endsection
