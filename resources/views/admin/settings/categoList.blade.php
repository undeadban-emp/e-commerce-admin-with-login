@extends('layouts.main')
@section('title', 'Category List')
@section('settings', 'active')
@section('settingsShow', 'show')
@section('categoryListActive', 'active')
@prepend('page-css')
{{-- CSS HERE --}}
@endprepend

@prepend('meta-data')

@endprepend
@section('content')


<main class="content">
    <div id="showCategoryList" class="container-fluid p-0">
        <a id="newCategory" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New Category</a>
        <h1 class="h3 mb-3">Category List</h1>
        <div class="card">
            <div class="card-body">
                <table id="categoryTable" class="text-center table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Category Name</th>
                            <th>Product Category Code</th>
                            <th>Product Category Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="showNewCategory" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">New Category</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="newCategoryForm">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Category ID">Product Category Id</label>
                                    <input type="text" class="form-control" value="{{ $productIdLastId->product_category_id + 1 }}" name="productBarcode" id="productBarcode" placeholder="" disabled>
                                    <span class='text-danger' id="productBarcodeError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Category Name">Product Category Name</label>
                                    <input type="text" name="categoryName" class="form-control" id="categoryName" placeholder="">
                                    <span class='text-danger' id="categoryNameError"></span>
                                </div>

                                <div class="col-md-6">
                                    <label class="form-label" for="Product Name">Product Category Code</label>
                                    <input type="text" name="categoryCode" class="form-control" id="categoryCode" placeholder="">
                                    <span class='text-danger' id="categoryCodeError"></span>
                                </div>

                            <div class="col-md-6">
                                <label class="form-label" for="Product Markup Price">Product Category Status</label>
                                <select name="categoryStatus" id="categoryStatus" class="form-control choices-singles">
                                    <option value="">Please Select</option>
                                    @foreach ($categoryStatus as $categoryStatus)
                                    <option value="{{ $categoryStatus->product_status_id }}">{{  $categoryStatus->product_category_status }}</option>
                                    @endforeach
                                </select>
                                <span class='text-danger' id="categoryStatusError"></span>
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


    <div id="showEditCategory" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">Edit Category</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="editProductForm">
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Category id">Product Category id</label>
                                    <input type="text" name="" class="form-control" id="eCategoryID" placeholder="" disabled>
                                    <span class='text-danger' id=""></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Barcode">Product Name</label>
                                    <input type="text" class="form-control" name="eCategoryName" id="eCategoryName" placeholder="">
                                    <span class='text-danger' id="eCategoryNameError"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Barcode">Product Barcode</label>
                                    <input type="text" class="form-control" name="eProductBarcode" id="eProductBarcode" placeholder="">
                                    <span class='text-danger' id="eProductBarcodeError"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Category">Product Category Status</label>
                                    <select name="eProductCategory" id="eProductCategory" class="form-control choices-single">
                                        <option value="">Please Select</option>
                                        @foreach ($categoryStatuss as $categoryStatuss)
                                        <option value="{{ $categoryStatuss->product_status_id }}">{{  $categoryStatuss->product_category_status }}</option>
                                    @endforeach
                                    </select>
                                    <span class='text-danger' id="eProductCategoryError"></span>
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
<script src="{{ asset('assets/js/admin-settings-category-list.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@endsection
