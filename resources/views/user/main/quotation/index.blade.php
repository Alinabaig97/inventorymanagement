@extends('user.auth.layout.master')
@section('content')
<div id="layoutSidenav_content">
    <main>
        <div class="container-fluid px-4 mt-3">
            <div class="d-flex align-items-center justify-content-between">
                <h1 class="fw-bold py-3 mb-4 ">Quotation</h1>
                <a href="{{ route('quotation.create') }}" class="btn btn-primary"><i class="bx bx-plus"></i> Add
                    Quotation</a>
            </div>
            <table class="table table-striped table-inverse table-responsive mb-5 pb-5">
                <thead class="thead-inverse">
                    <tr>
                        <th>Customer Name</th>
                        <th>Date</th>
                        <th>Order Tax</th>
                        <th>Discount</th>
                        <th>Shipping</th>
                        <th>Note</th>
                        <th>total Price</th>
                        <th>Status</th>
                        <th>Payment</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($quotations as $quotation)
                    <tr>
                        <td>{{ $quotation->customer->name }}</td>

                        <td>{{ $quotation->date }}</td>
                        <td>{{ $quotation->order_tax }}</td>
                        <td>{{ $quotation->discount }}</td>
                        <td>{{ $quotation->shipping }}</td>
                        <td>{{ $quotation->note }}</td>
                        <td>{{ $quotation->total_price }}</td>
                        <td>
                          

                        @if ($quotation->status == 0)
                        <span class="text text-warning">Pending...</span>
                        <td>
                            <button type="submit" disabled class="btn btn-success">PayNow</button>
                        </td>
                        @elseif ($quotation->status == 1 && $quotation->pay_status == 1 )
                        <span class="text text-success">Approved</span>
                        <td><span class="text text-primary"> <b> Paid</b></span></td>

                        @endif

                        @if ( $quotation->status == 1 && $quotation->pay_status == 0)
                        <span class="text text-success">Approved</span>
                        <td>
                            <a href="{{ route('payment.show', $quotation->id) }}"><button type="submit"
                                    class="btn btn-success">PayNow</button></a>
                        </td>
                        @elseif ($quotation->status == 2)

                        <span class="text text-danger"><b> Reject </b></span>
                        <td></td>
                        @else
                        @endif

                        {{--
                        @foreach ($pays as $pay)
                        @if ($pay->status == 1)
                        <span class="text text-success">Paid</span>
                        <td style="display: none"> <a href=" ">
                                <button type="submit" class="btn btn-success">PayNow</button></a></td>
                        @endif --}}

                    </tr>
                </tbody>
                @endforeach

            </table>

        </div>
    </main>

</div>
@endsection