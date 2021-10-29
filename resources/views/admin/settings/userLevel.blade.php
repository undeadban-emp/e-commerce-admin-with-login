@extends('layouts.main')
@section('title', 'User Level')
@section('settings', 'active')
@section('settingsShow', 'show')
@section('userLevelActive', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend
@prepend('meta-data')
@endprepend
@section('content')


<main class="content">
    <div id="showUserLevelList" class="container-fluid p-0">
        <a id="newUserLevel" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New User Level</a>
        <h1 class="h3 mb-3">User Level List</h1>
        <div class="card">
            <div class="card-body">
                <table id="userLevelTable" class="text-center table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>User Level ID</th>
                            <th>User Level Name</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="showNewUserLevel" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">New Order Status</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="newUserLevelForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Order Status id">User Level ID</label>
                                    <input type="text" class="form-control" value="" name="" id="" placeholder="" disabled>
                                    <span class='text-danger' id=""></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Category Name">User Level Name</label>
                                    <input type="text" name="userLevelName" class="form-control" id="userLevelName" placeholder="">
                                    <span class='text-danger' id="userLevelNameError"></span>
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


    <div id="showEditUserLevel" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">Edit User Level</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="editUserLevelForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Category id">User Level Id</label>
                                    <input type="text" name="" class="form-control" id="eUserLevelID" placeholder="" disabled>
                                    <span class='text-danger' id=""></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Barcode">Order Status Name</label>
                                    <input type="text" class="form-control" name="eUserLevelName" id="eUserLevelName" placeholder="">
                                    <span class='text-danger' id="eUserLevelNameError"></span>
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
<script src="{{ asset('assets/js/admin-settings-user-level.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@endsection
