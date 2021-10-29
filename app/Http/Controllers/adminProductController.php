<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\Product;
use App\ProductCategory;
use App\ProductCategoryStatus;
use Illuminate\Http\Request;

class adminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductCategoryStatus = ProductCategoryStatus::select('product_status_id', 'product_category_status')->get();
        $ProductCategoryStatuses = ProductCategoryStatus::select('product_status_id', 'product_category_status')->get();
        $productCategory = ProductCategory::select('product_category_id', 'product_category_name')->get();
        $productCategories = ProductCategory::select('product_category_id', 'product_category_name')->get();
        return view('admin.products.productList', compact('productCategory', 'ProductCategoryStatus', 'productCategories', 'ProductCategoryStatuses'));
    }
    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Product::select('product_id', 'product_name', 'product_category_id', 'product_barcode', 'product_total_quantity', 'product_status_id', 'product_content', 'product_picture', 'product_original_price', 'product_markup_price')->with('productCategory:product_category_id,product_category_name', 'productCategoryStatus:product_status_id,product_category_status');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('product_category_id', function ($row) {
                            return $row->productCategory->product_category_name;
                        })
                    ->addColumn('image', function ($row) {
                        $url= asset('uploads/'.$row->product_picture);
                        return '<img src="'.$url.'" border="0" width="50" height="50" class="img-rounded" align="center" />';
                    })

                    ->addColumn('action', function($row){
                        $btn = "<button class='btn float-end mt-n1'><a title='Delete' value='$row->product_id' class='delete text-secondary delete  btn-md'><i class='fa fa-trash'></i></a></button>";
                        $btn = $btn."<button id='edit' class='btn float-end mt-n1' data-row='$row'><i class='fa fa-edit'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action', 'image'])
                    ->make(true);
        }
        return view('admin.products.productList');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'productImage'                        => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'productName'                         => 'required',
            'productCategory'                     => 'required',
            'productBarcode'                      => 'required',
            'productStatus'                       => 'required',
            'productTotalQuantity'                => 'required',
            'productOriginalPrice'                => 'required',
            'productMarkupPrice'                  => 'required',
            'productContent'                      => 'required',
        ]);
        $products = new Product;
        $products->product_name                     = $request['productName'];
        $products->product_category_id            = $request['productCategory'];
        $products->product_barcode                  = $request['productBarcode'];
        $products->product_content                  = $request['productContent'];
        $products->product_total_quantity           = $request['productTotalQuantity'];
        $products->product_original_price           = $request['productOriginalPrice'];
        $products->product_markup_price             = $request['productMarkupPrice'];
        $products->product_status_id                   = $request['productStatus'];
        if($request->hasFile('productImage')){
            $file = $request->file('productImage');
            $nameExtension = $file->getClientOriginalName();
            $filename = time() . '-' . $nameExtension;
            $file->move('uploads', $filename);
            $products->product_picture = $filename;
        }else{
            return $request;
            $products->product_picture = '';
        }
        $products->save();
        return response()->json(['success'=>true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($product_id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $office = Product::find($id);

        $this->validate($request, [
            'eProductName'      => 'required',
            'eProductCategory' => 'required',
            'eProductBarcode'      => 'required',
            'eProductStatus'      => 'required',
            'eProductTotalQuantity'      => 'required',
            'eProductOriginalPrice'      => 'required',
            'eProductMarkupPrice'      => 'required',
            'eProductContent'      => 'required',
        ], [], [
            'eProductName'      => 'Product Name',
            'eProductCategory'      => 'Product Category',
            'eProductBarcode' => 'Product Barcode',
            'eProductStatus'      => 'Product Status',
            'eProductTotalQuantity'    => 'Product Total Quantity',
            'eProductOriginalPrice'    => 'Product Original Price',
            'eProductMarkupPrice'    => 'Product Markup Price',
            'eProductContent'    => 'Product Content',
        ]);

        $office->product_name   = $request->eProductName;
        $office->product_category_id  = $request->eProductCategory;
        $office->product_barcode  = $request->eProductBarcode;
        $office->product_content = $request->eProductContent;
        $office->product_total_quantity = $request->eProductTotalQuantity;
        $office->product_original_price = $request->eProductOriginalPrice;
        $office->product_markup_price = $request->eProductMarkupPrice;
        $office->product_status_id = $request->eProductStatus;
        $office->save();

        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
