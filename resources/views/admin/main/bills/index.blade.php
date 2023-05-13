@extends('admin.main.layout.master')

@section('content')
    <style>
        @media print {

            .no-print,
            .no-print * {
                display: none !important;
            }

            .change {
                display: none !important;
            }

            h3 {
                font-family: Roboto, "Helvetica Neue", Helvetica, Arial, sans-serif;
                font-weight: 500;
                font-size: 26px;
                margin: 0px;
                padding: 2px;
                text-align: center;
                color: #474747;
            }

            .invoice-box-four td,
            th {
                font-size: 20px !important;
                line-height: 30px !important;

            }

            .invoice-box-four {
                position: relative;
                top: 0 !important;
                bottom: 0 !important;
                left: 0 !important;
                right: 0 !important;
                page-break-inside: avoid !important;
                height: 40% !important;
                width: 40% !important;
                margin: 5% 5% !important;
                float: left !important;
                padding: 5px !important;
                page-break-inside: avoid !important;

            }

            .invoice-box td,
            th {
                font-size: 20px !important;
                line-height: 30px !important;

            }

            .invoice-box {
                position: relative;
                top: 0 !important;
                bottom: 0 !important;
                left: 0 !important;
                right: 0 !important;
                page-break-inside: avoid !important;
                height: 96% !important;
                width: 100% !important;
                margin: 2% 0 !important;
                float: none !important;
                padding: 5px !important;
                page-break-inside: avoid !important;

            }
        }

        .invoice-box {
            width: 315px;
            margin-top: 50px;
            margin-left: 30px;
            float: left;
            padding: 5px;
            border: 1px solid #000000 !important;
        }

        .btn-group-toggle>.btn,
        .btn-group-toggle>.btn-group>.btn {
            margin-bottom: 0;
            background: #d1d1d8;
            font-size: revert;
            font-weight: 700;
        }

        .print {
            position: relative;
            bottom: 50px;
            left: 74%;
        }

        .btn-group,
        .btn-group-vertical {
            position: relative;
            display: inline-flex;
            vertical-align: middle;

        }

        .badge-dark {
            color: #fff;
            background-color: #222230;

            line-height: 21px;
            height: 35px;
        }

        @media screen and (max-width: 480px) {
            .invoice-box {
                width: 98% !important;
                margin: 25px 0 !important;
                ;
                float: none !important;
                ;
                padding: 1% !important;
                ;
                border: 1px solid #000000 !important !important;
                ;
            }

        }

        .invoice-box {
            width: 315px;
            margin-top: 50px;
            margin-left: 29px;
            float: left;
            padding: 5px;
            font-family: system-ui;
            border: 1px solid #000000 !important;
        }

        h3.company_name {
            font-size: 26px !important;
            font-family: Roboto, "Helvetica Neue", Helvetica, Arial, sans-serif !important;
            font-weight: 500 !important;
            color: #474747 !important;
        }

        th {
            font-weight: 600;
        }
    </style>

    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">Bills</h1>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <form method="GET" class="searchbills" id="searchbills">
                        <input type="date" class="form-control date" name="date" id="date">
                        <button class="mt-3 btn btn-secondary btn" type="submit">Search</button>
                </div>
                <div class="col-md-6">
                    <select name="name" id="customer_id" class="form-control customer_id">
                        <option selected disabled>Select Customer</option>
                        @foreach ($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            </form>

            <!--<button class="change" onclick="myFunction()">Print</button>-->

            <button type="button" name="options" class="btn btn-primary option2" id="option2">Print</button>
            <div class="col-md-12">
                <div class="invoice-box-four">
                    {{-- <input type="checkbox" checked class="no-print print-checkbox md-input"> --}}
                    <table class="table table-condensed invoice-table" data-customer-id id="filter-form">
                        <tbody class="bills-table">

                        </tbody>
                    </table>
                    <div class="row appendhtml" id="appendhtml"></div>

                </div>
            </div>

        </div>
    </div>
@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js"></script>
<script src="	https://cdnjs.cloudflare.com/ajax/libs/printThis/1.15.0/printThis.min.js.map"></script>
<script>
    $(function() {
        $('.searchbills').submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ route('GetBills.filter') }}",
                type: 'GET',
                data: $(this).serialize(),
                success: function(response) {
                    $('.appendhtml').html(response);
                }
            });
        });
    });


    function myFunction() {

        var element = document.getElementById("appendhtml");

        $(".appendhtml").printThis({
            debug: false, // show the iframe for debugging
            importCSS: true, // import parent page css
            importStyle: true, // import style tags
            printContainer: true, // print outer container/$.selector
            loadCSS: "", // path to additional css file - use an array [] for multiple
            pageTitle: "", // add title to print page
            removeInline: false, // remove inline styles from print elements
            removeInlineSelector: "*", // custom selectors to filter inline styles. removeInline must be true
            printDelay: 333, // variable print delay
            header: null, // prefix to html
            footer: null, // postfix to html
            base: false, // preserve the BASE tag or accept a string for the URL
            formValues: true, // preserve input/form values
            canvas: false, // copy canvas content
            doctypeString: '', // enter a different doctype for older markup
            removeScripts: false, // remove script tags from print content
            copyTagClasses: false, // copy classes from the html & body tag
            beforePrintEvent: null, // function for printEvent in iframe
            beforePrint: null, // function called before iframe is filled
            afterPrint: null // function called before iframe is removed
        });
    }
    $(document).ready(function() {
        $('.option2').click(function(e) {
            e.preventDefault();
            myFunction();

        });
    });
</script>
