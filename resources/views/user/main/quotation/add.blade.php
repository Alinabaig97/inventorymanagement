@extends('user.auth.layout.master')
@section('content')
    <div id="layoutSidenav_content">
        <main>
            <form action="{{ route('quotation.store') }}" method="post">
                @csrf
                <div class="container-fluid px-4 mt-3">
                    <div class="d-flex align-items-center justify-content-between">
                        <h1 class="fw-bold py-3 mb-4 ">Quotation</h1>
                        {{-- <a href="{{ route('customer.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add User</a> --}}
                    </div>

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
                            <label for="">Date</label>
                            <input type="date" name="date" class="form-control" id="">
                        </div>

                        <div class="col-md-6">
                            <label for="">Customer ID</label>
                            <select class="form-control" name="customer_id" id="customer_id">
                                <option selected disabled>Select Customer</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>



                    <div class="row mt-2">

                        <div class="col-md-6">
                            <label for="">Note</label>
                            <textarea name="note" class="form-control" id=""></textarea>
                        </div>
                        <div class="col-md-6">
                            <label for="">Total Price</label>
                            <input type="text" name="total_price" class="form-control" id="">
                        </div>
                    </div>
                    <div class="col-md-3 mt-3">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>

                    <div class="row">
                        <div class="col-md-8">
                            <input type="search" name="search" id="" class="form-control mt-4 search"
                                placeholder="Serach Products Here">
                        </div>
                    </div>


                    <div class="d-flex justify-content-end">
                        <div class="p-0">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <ul class="list-group list-group-flush p-3">
                                            <li class="list-group-item">Order Tax: <span id="order">7%</span></li>
                                            <li class="list-group-item">Discount: <span id="discount">2%</span> </li>
                                            <li class="list-group-item">Shipping: <span id="shipping">10</span></li>
                                            <li class="list-group-item text text-success">Grant Total: Rs.<span
                                                    id="total">500</span></li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="serach_result"></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Sr</th>
                                <th></th>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody class="search_result">

                        </tbody>
                    </table>
                    <div class="row mt-5 mb-5 pb-5">
                        <div class="col-md-4">
                            <label for="">Order Tax</label>
                            <input type="text" name="order_tax" class="form-control" id="order">
                        </div>

                        <div class="col-md-4">
                            <label for="">Discount</label>
                            <input type="text" name="discount" class="form-control" id="discount">
                        </div>
                        <div class="col-md-4">
                            <label for="">Shipping</label>
                            <input type="text" name="shipping" class="form-control" id="shipping">
                        </div>
                    </div>
                </div>


            </form>
        </main>

    </div>

@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<script>
    $(document).ready(function() {
        $('.search').blur(function(e) {
            var value = $(this).val();
            $.ajax({
                type: "get",
                url: "{{ route('quotation.search') }}",
                data: {
                    'search': value
                },
                success: function(response) {
                    // clear the previous search results

                    $('tbody').html('');

                    if (response.length > 0) {

                        $.each(response, function(index, product) {
                            // append each product to the search results container
                            console.log(product.name);

                            var html = '' +
                                '<tr>' +
                                '    <td>' + index + 1 + '</td>' +
                                '<td><input type="hidden" name="product_id" value="' +
                                product.id + '"></td>' +
                                '    <td>' + product.name + '</td>' +
                                '    <td>' +
                                '<div class="row">' +
                                '<div class="col-md-3">' +
                                '        <div class="input-group">' +
                                '            <span class="input-group-btn">' +
                                '                <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-id="' +
                                product.id + '"  data-type="minus" data-field="">' +
                                '                    - ' +
                                '                </button>' +
                                '            </span>' +
                                '            <input type="text" id="quantity"  name="quantity" class="form-control input-number plus' +
                                product.id + '" value="1" min="1" max="100">' +
                                '            <span class="input-group-btn">' +
                                '                <button type="button" class="quantity-right-plus btn btn-success btn-number" data-id="' +
                                product.id + '" data-type="plus" data-field="">' +
                                '                    +' +
                                '                </button>' +
                                '            </span>' +
                                '        </div>' +
                                '        </div>' +
                                '        </div>' +
                                '    </td>' +
                                '    <td class="product-price' + product.id +
                                '" data-price="' + product.price + '">' +
                                product.price +
                                '</td>' +
                                '</tr>'


                            setTimeout(() => {
                                $('.search').removeAttr('disabled',
                                    'disabled');

                                $('tbody').append(html);

                            }, 250);



                        });
                    } else {
                        // if no products are found, show a message
                        // $('.serach-result').html(
                        //     '<div class="no-results">No products found</div>');


                        $('tbody').html('<div class="no-results">No products found</div>');

                    }
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {

        var quantitiy = 0;
        $(document).on('click', '.quantity-right-plus', function(e) {

            e.preventDefault();
            // Increament work on button
            var id = $(this).attr('data-id');
            var quantity = parseInt($('.plus' + id).val());
            var quantityInput = $('.plus' + id).val();
            var increament = parseInt(quantity) + 1;
            var priceCell = $('.product-price' + id).attr('data-price');
            var price = parseFloat(priceCell);
            var total = increament * price;
            $('.product-price' + id).text(total);
            $('.plus' + id).val(quantity + 1);

        });
        $(document).on('click', '.quantity-left-minus', function(e) {

            e.preventDefault();

            // decreament work on button
            var id = $(this).attr('data-id');
            var quantity = $('.plus' + id).val();
            var quantityInput = $('.plus' + id).val();
            var decreament = parseInt(quantity) - 1;
            var priceCell = $('.product-price' + id).attr('data-price');
            var price = parseFloat(priceCell);
            if (decreament < 0) {
                decreament = 0;
            }
            var total = decreament * price;
            $('.product-price' + id).text(total.toFixed(2));
            $('.product-price' + id).text(total)
            $('.plus' + id).val(parseInt(quantity) - 1);
        });

    });

    // Get the initial values of the inputs and update the total
    var orderTax = parseFloat($('#order').text().replace('%', '')) / 100;
    var discount = parseFloat($('#discount').text().replace('%', '')) / 100;
    var shipping = parseFloat($('#shipping').text());
    updateTotal(orderTax, discount, shipping);

    // Add event listeners to the input fields
    $('#order').on('input', function() {
        var orderTax = parseFloat($(this).val()) / 100;
        var discount = parseFloat($('#discount').text().replace('%', '')) / 100;
        var shipping = parseFloat($('#shipping').text());
        updateTotal(orderTax, discount, shipping);
    });

    $('#discount').on('input', function() {
        var orderTax = parseFloat($('#order_tax').text().replace('%', '')) / 100;
        var discount = parseFloat($(this).val()) / 100;
        var shipping = parseFloat($('#shipping').text());
        updateTotal(orderTax, discount, shipping);
    });

    $('#shipping').on('input', function() {
        var orderTax = parseFloat($('#order_tax').text().replace('%', '')) / 100;
        var discount = parseFloat($('#discount').text().replace('%', '')) / 100;
        var shipping = parseFloat($(this).val());
        updateTotal(orderTax, discount, shipping);
    });

    // Function to update the total
    function updateTotal(orderTax, discount, shipping) {
        var subTotal = parseFloat($('#sub_total').text());
        var tax = subTotal * orderTax;
        var discountAmount = subTotal * discount;
        var total = subTotal + tax + shipping - discountAmount;
        $('#total').text(total.toFixed(2));
    }
</script>
