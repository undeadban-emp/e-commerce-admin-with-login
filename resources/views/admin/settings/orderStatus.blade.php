@extends('layouts.main')
@section('title', 'Order Status')
@section('settings', 'active')
@section('settingsShow', 'show')
@section('orderStatusActive', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend

@prepend('meta-data')

@endprepend
@section('content')

<main class="content">
    <div id="showOrderStatusList" class="container-fluid p-0">
        <a id="newOrderStatus" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New Order Status</a>
        <h1 class="h3 mb-3">Order Status List</h1>
        <div class="card">
            <div class="card-body">
                <table id="orderStatusTable" class="text-center table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Order Status ID</th>
                            <th>Order Status Name</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="showNewOrderStatus" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">New Order Status</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="newOrderStatusForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Order Status id">Order Status Id</label>
                                    <input type="text" class="form-control" value="
                                    {{-- @if($orderStatusLastId->order_status_id == null){
                                        1
                                    }
                                    @else{
                                        {{ $orderStatusLastId->order_status_id + 1 }}
                                    }
                                    @endif --}}
                                    " name="" id="" placeholder="" disabled>
                                    <span class='text-danger' id=""></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Category Name">Order Status Name</label>
                                    <input type="text" name="orderStatusName" class="form-control" id="orderStatusName" placeholder="">
                                    <span class='text-danger' id="orderStatusNameError"></span>
                                </div>
                            </div>
                            <div class="row float-end pt-3">
                                <div class="col-6">
                                    <button type="button" id="cancelButton" class="btn btn-danger">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" id="submitButton" class="btn btn-primary">
                                        <span id="spinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span id="save">Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div id="showEditOrderStatus" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">Edit Category</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="editOrderStatusForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Category id">Order Status Id</label>
                                    <input type="text" name="" class="form-control" id="eOrderStatusID" placeholder="" disabled>
                                    <span class='text-danger' id=""></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Barcode">Order Status Name</label>
                                    <input type="text" class="form-control" name="eOrderStatusName" id="eOrderStatusName" placeholder="">
                                    <span class='text-danger' id="eOrderStatusNameError"></span>
                                </div>
                        </div>
                            <div class="row float-end pt-3">
                                <div class="col-6">
                                    <button type="button" id="editCancelButton" class="btn btn-danger">Cancel</button>
                                </div>
                                <div class="col-6">
                                    <button type="submit" id="editSubmitButton" class="btn btn-primary">
                                        <span id="editSpinner" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span>
                                        <span id="editSave">Save</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>


@push('page-scripts')
<script src="{{ asset('assets/js/datatables.js') }}"></script>
<script src="{{ asset('assets/js/admin-settings-order-status.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@endsection
