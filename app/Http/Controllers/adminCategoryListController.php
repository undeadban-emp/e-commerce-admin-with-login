<?php

namespace App\Http\Controllers;
use Yajra\Datatables\Datatables;
use App\ProductCategory;
use App\ProductCategoryStatus;
use Illuminate\Http\Request;

class adminCategoryListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ProductCategory = ProductCategory::select('product_category_id', 'product_category_name', 'product_category_code', 'product_category_status')->get();
        $productIdLastId = ProductCategory::latest('product_category_id')->first();
        $categoryStatus = ProductCategoryStatus::select('product_status_id', 'product_category_status')->get();
        $categoryStatuss = ProductCategoryStatus::select('product_status_id', 'product_category_status')->get();
        return view('admin.settings.categoList', compact('ProductCategory', 'productIdLastId', 'categoryStatus', 'categoryStatuss'));
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

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = ProductCategory::select('product_category_name', 'product_category_status', 'product_category_code', 'product_category_id');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "<button id='delete' value='$row->product_category_id' class='btn float-end mt-n1 delete'><a title='Delete' class='delete text-secondary btn-md'><i class='fa fa-trash'></i></a></button>";
                        $btn = $btn."<button id='edit' class='btn float-end mt-n1 edit' data-row='$row'><i class='fa fa-edit'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.settings.categolist');
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
            'categoryName'                          => 'required',
            'categoryCode'                          => 'required',
            'categoryStatus'                        => 'required',
        ]);
        $products = new ProductCategory;
        $products->product_category_name                    = $request['categoryName'];
        $products->product_category_code                    = $request['categoryCode'];
        $products->product_category_status                  = $request['categoryStatus'];
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
    public function edit($id)
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
        $office = ProductCategory::find($id);
        $this->validate($request, [
            'eCategoryName'      => 'required',
            'eProductBarcode' => 'required',
            'eProductCategory'      => 'required',
        ], [], [
            'eCategoryName'      => 'Category Name',
            'eProductBarcode'      => 'Product Code',
            'eProductCategory' => 'Product Category',
        ]);
        $office->product_category_name   = $request->eCategoryName;
        $office->product_category_code  = $request->eProductBarcode;
        $office->product_category_status  = $request->eProductCategory;
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
        ProductCategory::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
