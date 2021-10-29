<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerOrder;
use Yajra\Datatables\Datatables;
use Carbon\Carbon;
class adminOrderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderCountPending = CustomerOrder::select('customer_order_id', 'customer_order_status')->where('customer_order_status', '1')->count();
        $orderCountOnProcess = CustomerOrder::select('customer_order_id', 'customer_order_status')->where('customer_order_status', '2')->count();
        $orderCountForDelivery = CustomerOrder::select('customer_order_id', 'customer_order_status')->where('customer_order_status', '3')->count();
        return view('admin.orders.orderlist', compact('orderCountPending', 'orderCountOnProcess', 'orderCountForDelivery'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomerOrder::select('customer_order_id', 'customer_order_customer_id', 'customer_order_date', 'customer_order_time', 'customer_order_customer_name', 'customer_order_address', 'customer_order_delivery_instruction', 'customer_order_payment_method', 'customer_order_cash_on_hand', 'customer_order_sub_total', 'customer_order_delivery_fee', 'customer_order_total', 'customer_order_status')
                                    ->with('orderDetails:order_details_order_id,order_details_customer_id,order_details_product_name,order_details_quantity,order_details_product_unit_price,order_details_total,order_details_checkout_status')
                                    ->where('customer_order_status', 1);
                                    return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->editColumn('customer_order_date_time', function ($data) {
                        return $data->customer_order_date . ' ' .$data->customer_order_time;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<button id='savePending' class='btn float-end mt-n1 edit'  data-rowPending='$row->customer_order_id'><i class='fa fa-save '></i></button>";
                        $btn = $btn."<button id='show' class='btn float-end mt-n1' data-details='$row->orderDetails' data-row='$row'><i class='fa fa-list-ol'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.orders.orderlist');
    }

    public function lists(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomerOrder::select('customer_order_id', 'customer_order_customer_id', 'customer_order_date', 'customer_order_time', 'customer_order_customer_name', 'customer_order_address', 'customer_order_delivery_instruction', 'customer_order_payment_method', 'customer_order_cash_on_hand', 'customer_order_sub_total', 'customer_order_delivery_fee', 'customer_order_total', 'customer_order_status')
                                    ->with('orderDetails:order_details_order_id,order_details_customer_id,order_details_product_name,order_details_quantity,order_details_product_unit_price,order_details_total,order_details_checkout_status')
                                    ->where('customer_order_status', 2);
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->editColumn('customer_order_date_time', function ($data) {
                        return $data->customer_order_date . ' ' .$data->customer_order_time;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<button id='saveOnProcess' class='btn float-end mt-n1 edit'  data-rowOnProcess='$row->customer_order_id'><i class='fa fa-save '></i></button>";
                        $btn = $btn."<button id='show' class='btn float-end mt-n1' data-details='$row->orderDetails' data-row='$row'><i class='fa fa-list-ol'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.orders.orderlist');
    }

    public function listss(Request $request)
    {
        if ($request->ajax()) {
            $data = CustomerOrder::select('customer_order_id', 'customer_order_customer_id', 'customer_order_date', 'customer_order_time', 'customer_order_customer_name', 'customer_order_address', 'customer_order_delivery_instruction', 'customer_order_payment_method', 'customer_order_cash_on_hand', 'customer_order_sub_total', 'customer_order_delivery_fee', 'customer_order_total', 'customer_order_status')
                                    ->with('orderDetails:order_details_order_id,order_details_customer_id,order_details_product_name,order_details_quantity,order_details_product_unit_price,order_details_total,order_details_checkout_status')
                                    ->where('customer_order_status', 3);
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->editColumn('customer_order_date_time', function ($data) {
                        return $data->customer_order_date . ' ' .$data->customer_order_time;
                    })
                    ->addColumn('action', function($row){
                        $btn = "<button id='saveForDelivery' class='btn float-end mt-n1 edit'  data-rowForDelivery='$row->customer_order_id'><i class='fa fa-save '></i></button>";
                        $btn = $btn."<button id='show' class='btn float-end mt-n1' data-details='$row->orderDetails' data-row='$row'><i class='fa fa-list-ol'></i></button>";
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
    public function updatePending(Request $request, $id)
    {
        $orderPending = CustomerOrder::find($id);
        $orderPending->customer_order_status   = $request->data;
        $orderPending->save();
        return response()->json(['success' => true]);
    }

    public function updateCompleted(Request $request, $id)
    {
        $orderCompleted = CustomerOrder::find($id);
        $orderCompleted->customer_order_status   = $request->data;
        $orderCompleted->customer_order_completed   = Carbon::now();
        $orderCompleted->save();
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
        //
    }
}
