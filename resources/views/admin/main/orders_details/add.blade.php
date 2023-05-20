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
                                <label for="inputRole">Date</label>
                                <input type="date" class="form-control" id="date" name="date">
                            </div>
                        </div>

                        <input type="hidden" class="form-control" readonly id="price" name="price">


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
                                <label for="inputRole">User Amount</label>
                                <input type="text" class="form-control amount" id="amount " readonly name="amount"
                                    placeholder="Enter Total">
                                <input type="hidden" class="form-control calAmount" id="calAmount" readonly name="amount"
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
                    product_id: product_id,
                },
                success: function(response) {
                    $('#quantity').val(response
                        .quantity); // update the quantity input field
                    $('#price').val(response.price); // update the unit price input field
                  
                    var quantity = response.quantity; // assign response quantity to variable
                    var price = response.price; // assign response price to variable
                    var priceVal = quantity * price;
                    $('#price').val(priceVal); // update the calculated price input field
                    $('#total').val(priceVal);
                    calculateAmount();
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
                $('.calAmount').val(response.amount);
                var amount = $('.calAmount').val()
                var total = $('#total').val();
                if (total != '') {

                    setTimeout(() => {
                        var sum = Number(amount) - Number(total);
                        $('.amount').val(sum); // update the amount input field
                        $('.calAmount').val(response.amount);
                        calculateAmount();
                    }, 250);

                } else {
                    $('.amount').val(response.amount); // update the amount input field
                }

            }
        });
    });
    // calculate the total based on the new quantity and unit price
    $('.discount').keyup(function() {
        var discount = $(this).val();
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        var amount = $('.amount').val();
        var attrAmount = $('.calAmount').val();
        var total = price * (1 - discount / 100);
        var final = attrAmount - total;
        if (amount != "") {
            $('.amount').val(final);

        }

        $('#total').val(total);


        // $('#total').val(total); // update the total input field
    });

    function calculateAmount() {
        var discount = $('.discount').val();
        var quantity = $('#quantity').val();
        var price = $('#price').val();
        var amount = $('.amount').val();
        var attrAmount = $('.calAmount').val();
        var total = price * (1 - discount / 100);
        $('#total').val(total); // update the total input field   
        if (amount != "") {
            var sum = attrAmount - total;
            $('.amount').val(sum); // update the amount input field
        }
    }

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
