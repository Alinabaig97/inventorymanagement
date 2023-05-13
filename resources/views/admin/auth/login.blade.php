@extends('admin.auth.layout.master')
@section('content')
    
<div id="layoutAuthentication">
    <div id="layoutAuthentication_content">
        <main>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Login</h3>
                            </div>
                           
            
                            <div class="card-body">
                                <form  action="{{route('login')}}" method="post">
                                    @csrf
                                    @error('throttle')
                                        <strong>{{ $message }}</strong>
                                    @enderror
                                    @if($errors)
                                        @foreach ($errors->all() as $error)
                                            <p class="alert alert-danger">{{$error}}</p>
                                        @endforeach
                                    @endif
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputEmail" name="email" type="email"
                                            placeholder="name@example.com" />
                                        <label for="inputEmail">Email address</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input class="form-control" id="inputPassword" name="password" type="password"
                                            placeholder="Password" />
                                        <label for="inputPassword">Password</label>
                                    </div>
                                    <div class="form-check mb-3">
                                        <input class="form-check-input" type="checkbox"
                                            value="" id="remember-me"  />
                                        <label class="form-check-label" for="inputRememberPassword">Remember
                                            Password</label>
                                    </div>

                                        <button class="btn btn-primary" href="" type="submit">Login</button>
                                    </div>
                                </form>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <div id="layoutAuthentication_footer">
        <footer class="py-4 bg-light mt-auto">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between small">
                    <div class="text-muted">Copyright &copy; Your Website 2023</div>
                    <div>
                        <a href="#">Privacy Policy</a>
                        &middot;
                        <a href="#">Terms &amp; Conditions</a>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</div>
@endsection
