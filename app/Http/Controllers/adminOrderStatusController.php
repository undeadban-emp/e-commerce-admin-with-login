<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\OrderStatus;
use Yajra\Datatables\Datatables;

class adminOrderStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderStatusLastId = OrderStatus::latest('order_status_id')->first();
        return view('admin.settings.orderStatus', compact('orderStatusLastId'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = OrderStatus::select('order_status_id', 'order_status_name');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "<button id='delete' value='$row->order_status_id' class='btn float-end mt-n1 delete'><a title='Delete' class='delete text-secondary btn-md'><i class='fa fa-trash'></i></a></button>";
                        $btn = $btn."<button id='edit' class='btn float-end mt-n1 edit' data-row='$row'><i class='fa fa-edit'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.settings.orderStatus');
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
            'orderStatusName'                          => 'required',
        ]);
        $products = new OrderStatus;
        $products->order_status_name                    = $request['orderStatusName'];
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
        $office = OrderStatus::find($id);
        $this->validate($request, [
            'eOrderStatusName'      => 'required',
        ], [], [
            'eOrderStatusName'      => 'Order Status Name',
        ]);
        $office->order_status_name   = $request->eOrderStatusName;
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
        OrderStatus::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
