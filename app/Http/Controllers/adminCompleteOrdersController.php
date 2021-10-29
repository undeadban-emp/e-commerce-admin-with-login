<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerOrder;
use Yajra\Datatables\Datatables;

class adminCompleteOrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.orders.completedOrders');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomerOrder::select('customer_order_id', 'customer_order_customer_id', 'customer_order_date', 'customer_order_time', 'customer_order_customer_name', 'customer_order_address', 'customer_order_delivery_instruction', 'customer_order_payment_method', 'customer_order_cash_on_hand', 'customer_order_sub_total', 'customer_order_delivery_fee', 'customer_order_total', 'customer_order_status', 'customer_order_completed')
                                    ->with('orderDetails:order_details_order_id,order_details_customer_id,order_details_product_name,order_details_quantity,order_details_product_unit_price,order_details_total,order_details_checkout_status')
                                    ->where('customer_order_status', 4);
                                    return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->editColumn('customer_order_date_time', function ($data) {
                        return $data->customer_order_date . ' ' .$data->customer_order_time;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<button id='show' class='btn float-end mt-n1' data-details='$row->orderDetails' data-row='$row'><i class='fa fa-list-ol'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.orders.orderlist');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
