@extends('admin.main.layout.master')
@section('content')
    <style>
        .net-total {
            padding: 10px;
            background-color: rgb(163, 163, 246);
            color: #333;
            font-weight: 700;
            text-align: center
        }
    </style>
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-2 ">Create Sales</h1>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <form action="" method="post">
                            <div class="row mt-3">
                                <div class="col">
                                    <select class="form-control" name="" id="">
                                        <option>Select A Client</option>
                                        <option>b</option>
                                        <option>c</option>
                                    </select>
                                    <table class="table table-striped table-inverse table-responsive mt-4">
                                        <thead class="thead-inverse">
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <!-- Add table rows here -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col">
                                    <label for="">Discount Type</label>
                                    <select class="form-control" name="" id="">
                                        <option>Fixed</option>
                                        <option>b</option>
                                        <option>c</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="">Discount</label>
                                    <input type="text" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="Enter A discount">
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <label for="">Transport Cost</label>
                                    <input type="text" class="form-control" name="" id=""
                                        aria-describedby="helpId" placeholder="Enter Transport Cost">
                                </div>
                                <div class="col">
                                    <label for="">Invoice Tax</label>
                                    <select class="form-control" name="" id="">
                                        <option>Select an option</option>
                                        <option>b</option>
                                        <option>c</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <div class="form-control net-total">Net Total: 0%</div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Save & Payment
                                    </button>
                                </div>
                                <div class="col">
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fas fa-sync-alt"></i> Reset
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <div class="col-md-6">
                        <div class="row">
                            <div class="col mt-3">
                                <select class="form-control" name="" id="">
                                    <option>Select A Category</option>
                                    <option>b</option>
                                </select>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                  </div>
                            </div>
                            <div class="col-md-4">
                                <div class="card">
                                    <img class="card-img-top" src="..." alt="Card image cap">
                                    <div class="card-body">
                                      <h5 class="card-title">Card title</h5>
                                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                      <a href="#" class="btn btn-primary">Go somewhere</a>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endsection
