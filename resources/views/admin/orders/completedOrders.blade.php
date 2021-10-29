@extends('layouts.main')
@section('title', 'Completed Orders')
@section('orders', 'active')
@section('completeOrderActive', 'active')
@section('orderShow', 'show')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend

@prepend('meta-data')

@endprepend
@section('content')


<main class="content">
    <div id="showCustomerOrderList" class="container-fluid p-0">
        <h1 class="h3 mb-3">Customer Order List</h1>


        <div class="col-12 col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <table id="customerOrderCompletedOrders" class="text-center table table-striped table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Order No</th>
                                            <th>Customer Name</th>
                                            <th>Order Date/Time</th>
                                            <th>Order Delivered</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
        </div>



    </div>

    <div id="showCustomerOrderDetails" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">Order Details</h1>
            <div class="col-md-12">
                <div class="card">
                        <form id="showOrderDetailsForm">


                            <div class="row">
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-body m-sm-3 m-md-5">
                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <div class="text-muted">Customer Name:</div>
                                                    <strong class="mb-4" id="customerName">

                                                    </strong>
                                                    <div class="text-muted">Customer Address:</div>
                                                    <strong class="mb-4" id="address">

                                                    </strong>
                                                    <div class="text-muted">Customer Instruction:</div>
                                                    <strong class="mb-4" id="instruction">

                                                    </strong>
                                                </div>
                                                <div class="col-md-6 text-md-end">
                                                    <div class="text-muted">Payment Method:</div>
                                                    <strong class="mb-4" id="paymentMethod">

                                                    </strong>

                                                    <div class="text-muted">Cash on Hand:</div>
                                                    <strong class="mb-4" id="cashOnHand">

                                                    </strong>



                                                </div>
                                            </div>

                                            <hr class="my-4" />

                                            <table id="order-table-show" class="table table-sm">
                                                <thead>
                                                    <tr>
                                                        <th>Product Name</th>
                                                        <th>Quantity</th>
                                                        <th>Unit Price</th>
                                                        <th class="text-end">Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th></th>
                                                        <th></th>
                                                        <th class="text-end">Total Amount:</th>
                                                        <th id="totalAmount" class="text-end"></th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                            <div class="pt-5 text-end">
                                                <button type="button" id="showCancelButton" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                </div>
            </div>
    </div>
</main>


@push('page-scripts')
<script src="{{ asset('assets/js/datatables.js') }}"></script>
<script src="{{ asset('assets/js/admin-orders-completed-orders.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

@endpush
@endsection
