@extends('layouts.main')
@section('title', 'Customer')
@section('people', 'active')
@section('peopleShow', 'show')
@section('customerActive', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend

@prepend('meta-data')

@endprepend
@section('content')


<main class="content">
    <div id="showCustomerList" class="container-fluid p-0">
        <h1 class="h3 mb-3">Customer List</h1>
        <div class="card">
            <div class="card-body">
                <div class="pb-3">
                <label class="form-label" for="Customer Status">Filter</label>
                    <select name="customerFilter" id="customerFilter" class="form-control choices-singles">
                        <option value="">All</option>
                        @foreach ($status as $statuss)
                            <option value="{{ $statuss->status_id }}">{{  $statuss->status_name }}</option>
                        @endforeach
                    </select>
                </div>
                <table id="customerTable" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Customer Name</th>
                            <th>Customer Gender </th>
                            <th>Customer Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="showEditCustomer" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">Customer Details</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="editCustomerForm">
                            <div class="row">

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Name">Customer Name</label>
                                    <input type="text" name="eCustomerName" class="form-control" id="eCustomerName" placeholder="" disabled disabled>
                                    <span class='text-danger' id="eCustomerNameError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Email">Customer Email</label>
                                    <input type="text" name="eCustomerEmail" class="form-control" id="eCustomerEmail" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerEmailError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Gender">Customer Gender</label>
                                    <select name="eCustomerGender" id="eCustomerGender" class="form-control choices-singles" disabled>
                                        <option value="">Please Select</option>
                                        @foreach ($gender as $gender)
                                        <option value="{{ $gender->gender_id }}">{{  $gender->gender_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class='text-danger' id="eCustomerGenderError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Birthdate">Customer Birthdate</label>
                                    <input type="text" name="eCustomerBirthdate" class="form-control" id="eCustomerBirthdate" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerBirthdateError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Contact No">Customer Contact No</label>
                                    <input type="text" name="eCustomerContactNo" class="form-control" id="eCustomerContactNo" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerContactNoError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Province">Customer Province</label>
                                    <input type="text" name="eCustomerProvince" class="form-control" id="eCustomerProvince" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerProvinceError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Municipal">Customer Municipal</label>
                                    <input type="text" name="eCustomerMunicipal" class="form-control" id="eCustomerMunicipal" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerMunicipalError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Barangay">Customer Barangay</label>
                                    <input type="text" name="eCustomerBarangay" class="form-control" id="eCustomerBarangay" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerBarangayError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Purok/Street">Customer Purok/Street</label>
                                    <input type="text" name="eCustomerPurokStreet" class="form-control" id="eCustomerPurokStreet" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerPurokStreetError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer No of Orders">Customer No of Orders</label>
                                    <input type="text" name="eCustomerNoOfOrders" class="form-control" id="eCustomerNoOfOrders" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerNoOfOrdersError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Username">Customer Username</label>
                                    <input type="text" name="eCustomerUsername" class="form-control" id="eCustomerUsername" placeholder="" disabled>
                                    <span class='text-danger' id="eCustomerUsernameError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Password">Customer Password</label>
                                    <input type="text" name="eCustomerPassword" class="form-control" id="eCustomerPassword" placeholder="">
                                    <span class='text-danger' id="eCustomerPasswordError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Customer Status">Customer Status</label>
                                    <select name="eCustomerStatus" id="eCustomerStatus" class="form-control choices-singles">
                                        <option value="">Please Select</option>
                                        @foreach ($status as $statuss)
                                        <option value="{{ $statuss->status_id }}">{{  $statuss->status_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class='text-danger' id="eCustomerStatusError"></span>
                                </div>

                            </div>
                            <div class="row float-end">
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
<script src="{{ asset('assets/js/admin-people-customer.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@endsection
