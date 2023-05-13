@extends('admin.main.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4 mt-3">
            <div class="lign-items-center justify-content-between">
                <form method="post" action="{{ route('orders_details.store') }}">
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
                            <div class="form-group">
                                <label for="inputRole">Product_id</label>
                                <select class="form-control" name="product_id" id="product_id">
                                    <option selected disabled>Select Product</option>
                                    @foreach ($data as $product)
                                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputRole">Customer</label>
                                <select class="form-control" name="customers_id" id="customers">
                                    <option selected disabled>Select Customer</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>


                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputRole">Quantity</label>
                                <input type="text" class="form-control quantity" id="quantity" name="quantity"
                                    placeholder="Enter Quantity">
                                <input type="hidden" class="sumQty">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputName">UnitPrice</label>
                                <input type="text" class="form-control" id="unit_price" name="unit_price"
                                    placeholder="Enter name">
                            </div>
                        </div>

                    </div>
                    <div class="row mt-3">
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="inputName">Discount</label>
                                <input type="text" class="form-control discount" id="discount" name="discount"
                                    placeholder="Enter Discount">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="inputRole">Amonut</label>
                                <input type="text" class="form-control amount" id="amount " readonly name="amount"
                                    placeholder="Enter Total">

                            </div>
                        </div>
                    </div>


            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputRole">Total</label>
                        <input type="text" class="form-control" id="total" name="total" placeholder="Enter Total">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="inputRole">Date</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>
    </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('#product_id').on('change', function() {
            var product_id = $(this).val(); // get the selected product ID
            $.ajax({
                url: "{{ route('get.products') }}",
                method: 'GET',
                data: {
                    product_id: product_id
                },
                success: function(response) {
                    $('#quantity').val(response
                        .quantity); // update the quantity input field
                    $('#unit_price').val(response
                        .unit_price); // update the unit price input field 
                    $('.sumQty').val(response.quantity);
                }
            });
        });
        $('#customers').on('change', function() {
            var customer_id = $(this).val(); // get the selected customer ID
            $.ajax({
                url: "{{ route('get.amount') }}",
                method: 'GET',
                data: {
                    customer_id: customer_id
                },
                success: function(response) {

                    $('.amount').val(response.amount); // update the amount input field
                    console.log(response.amount);
                    var total = $('#total').val();

                    if (total != '') {
                        setTimeout(() => {
                            var amount = $('.amount').val();
                            var sum = amount - total;
                            console.log(sum);
                            $('.amount').val(sum);
                        }, 250);
                    }

                }
            });
        });
        // calculate the total based on the new quantity and unit price
        $('.discount').keyup(function() {
            var discount = $(this).val();
            var quantity = $('#quantity').val();
            var unit_price = $('#unit_price').val();
            var amount = $('.amount').val();
            var total = (quantity * unit_price) - discount;
            $('#total').val(total);
            if(amount != ''){
                var sum = amount - (quantity * unit_price) - discount ;
                $('.amount').val(sum);
            }

            // $('#total').val(total); // update the total input field
        });

        // check if the entered quantity is greater than the current quantity
        $('.quantity').keyup(function() {
            var value = $(this).val();
            var qty = $('.sumQty').val();
            if (Number(value) >= Number(qty)) {
                $('.quantity').val(qty); // Set the value of .quantity to qty

            }


        });
     



    });
</script>
