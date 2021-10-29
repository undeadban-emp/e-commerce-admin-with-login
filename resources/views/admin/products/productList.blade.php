@extends('layouts.main')
@section('title', 'Products')
@section('productList', 'active')
@prepend('page-css')
<style>
    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }

    .swal-content ul {
        list-style-type: none;
        padding: 0;
    }
</style>
<link rel="canonical" href="tables-datatables-responsive.html" />
@endprepend

@prepend('meta-data')

@endprepend
@section('content')

<main class="content">
    <div id="showProductList" class="container-fluid p-0">
        <a id="newProduct" class="btn btn-primary float-end mt-n1"><i class="fas fa-plus"></i> New product</a>
        <h1 class="h3 mb-3">Product List</h1>
        <div class="card">
            <div class="card-body">
                <table id="productTable" class="table table-striped table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th>Product Image</th>
                            <th>Product Name</th>
                            <th>Category Name</th>
                            <th>Original Price</th>
                            <th>MarkUp Price</th>
                            <th>Status</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <div id="showNewProduct" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">New Product</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form enctype="multipart/form-data" id="categoryForm">
                            @csrf
                            <div class="mb-3 col-md-3">
                                <label class="form-label" for="Product Image">Product Image</label>
                                <input  class="form-control" name="productImage" id="productImage" type="file">
                                <span class='text-danger' id="productImageError"></span>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Name">Product Name</label>
                                    <input type="text" name="productName" class="form-control" id="productName" placeholder="">
                                    <span class='text-danger' id="productNameError"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Category">Product Category</label>
                                    <select name="productCategory" id="productCategory" class="form-control choices-single">
                                        <option value="">Please Select</option>
                                        @foreach ($productCategory as $productCategory)
                                            <option value="{{ $productCategory->product_category_id }}">{{  $productCategory->product_category_name }}</option>
                                        @endforeach
                                    </select>
                                    <span class='text-danger' id="productCategoryError"></span>
                                </div>
                            <div class="col-md-6">
                                <label class="form-label" for="Product Barcode">Product Barcode</label>
                                <input type="text" class="form-control" name="productBarcode" id="productBarcode" placeholder="">
                                <span class='text-danger' id="productBarcodeError"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="Product Markup Price">Product Status</label>
                                <select name="productStatus" id="productStatus" class="form-control choices-singles">
                                    <option value="">Please Select</option>
                                    @foreach ($ProductCategoryStatus as $ProductCategoryStatus)
                                    <option value="{{ $ProductCategoryStatus->product_status_id }}">{{  $ProductCategoryStatus->product_category_status }}</option>
                                    @endforeach
                                </select>
                                <span class='text-danger' id="productStatusError"></span>
                            </div>
                        </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Total Quantity">Product Total Quantity</label>
                                    <input type="number" class="form-control" name="productTotalQuantity" id="productTotalQuantity">
                                    <span class='text-danger' id="productTotalQuantityError"></span>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Original Price">Product Original Price</label>
                                    <input type="number" class="form-control" name="productOriginalPrice" id="productOriginalPrice">
                                    <span class='text-danger' id="productOriginalPriceError"></span>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Markup Price">Product Markup Price</label>
                                    <input type="number" class="form-control" name="productMarkupPrice" id="productMarkupPrice">
                                    <span class='text-danger' id="productMarkupPriceError"></span>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Content">Product Content</label>
                                    <textarea name="productContent" id="productContent" class="form-control" placeholder="" rows="1"></textarea>
                                    <span class='text-danger' id="productContentError"></span>
                                </div>
                            </div>
                            <div class="row float-end">
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


    <div id="showEditProduct" class="container-fluid p-0 d-none">
        <h1 class="h3 mb-3">Edit Product</h1>
        <div class="card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <form id="editProductForm">
                            <div class="row">
                                <div class="col-md-4"></div>
                                    <div class="mb-3 col-md-4">
                                        <div class="text-center">
                                            <img src="" id="eProductImageSrc" class="border border-secondary rounded mb-2" src="" height="120" width="120">
                                        </div>
                                        <input class="form-control" name="eProductImage" id="eProductImage" type="text" disabled>
                                        <input class="form-control" name="eProductImageName" id="eProductImageName" type="file">
                                    </div>
                                <div class="col-md-4"></div>
                                </div>




                            <div class="row">
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Name">Product Name</label>
                                    <input type="text" name="eProductName" class="form-control" id="eProductName" placeholder="">
                                    <span class='text-danger' id="eProductNameError"></span>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="Product Category">Product Category</label>
                                    <select name="eProductCategory" id="eProductCategory" class="form-control choices-single">
                                        <option value="">Please Select</option>
                                        @foreach ($productCategories as $productCategories)
                                        <option value="{{ $productCategories->product_category_id }}">{{  $productCategories->product_category_name }}</option>
                                    @endforeach
                                    </select>
                                    <span class='text-danger' id="eProductCategoryError"></span>
                                </div>
                            <div class="col-md-6">
                                <label class="form-label" for="Product Barcode">Product Barcode</label>
                                <input type="text" class="form-control" name="eProductBarcode" id="eProductBarcode" placeholder="">
                                <span class='text-danger' id="eProductBarcodeError"></span>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="Product Markup Price">Product Status</label>
                                <select name="eProductStatus" id="eProductStatus" class="form-control choices-singles">
                                    <option value="">Please Select</option>
                                    @foreach ($ProductCategoryStatuses as $ProductCategoryStatuses)
                                    <option value="{{ $ProductCategoryStatuses->product_status_id }}">{{  $ProductCategoryStatuses->product_category_status }}</option>
                                    @endforeach
                                </select>
                                <span class='text-danger' id="eProductStatusError"></span>
                            </div>
                        </div>

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Total Quantity">Product Total Quantity</label>
                                    <input type="number" class="form-control" name="eProductTotalQuantity" id="eProductTotalQuantity">
                                    <span class='text-danger' id="eProductTotalQuantityError"></span>
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Original Price">Product Original Price</label>
                                    <input type="number" class="form-control" name="eProductOriginalPrice" id="eProductOriginalPrice">
                                    <span class='text-danger' id="eProductOriginalPriceError"></span>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Markup Price">Product Markup Price</label>
                                    <input type="number" class="form-control" name="eProductMarkupPrice" id="eProductMarkupPrice">
                                    <span class='text-danger' id="eProductMarkupPriceError"></span>
                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="Product Content">Product Content</label>
                                    <textarea name="eProductContent" id="eProductContent" class="form-control" placeholder="" rows="1"></textarea>
                                    <span class='text-danger' id="eProductContentError"></span>
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
<script src="{{ asset('assets/js/admin-products.js') }}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endpush
@endsection
