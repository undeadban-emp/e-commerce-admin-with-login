<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;
use Yajra\Datatables\Datatables;
use App\Gender;
use App\Status;

class adminCustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gender = Gender::select('gender_id', 'gender_name')->get();
        $status = Status::select('status_id', 'status_name')->get();
        return view('admin.people.customer', compact('gender', 'status'));
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::select('customer_id', 'customer_name', 'customer_email', 'customer_gender', 'customer_birthdate', 'customer_contact_no', 'customer_province', 'customer_municipal', 'customer_barangay', 'customer_purok_street', 'customer_no_of_orders', 'customer_username', 'customer_password', 'customer_status');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "<button id='delete' value='$row->customer_id' class='btn float-end mt-n1'><a title='Delete' class='delete text-secondary delete  btn-md'><i class='fa fa-trash'></i></a></button>";
                        $btn = $btn."<button id='edit' class='btn float-end mt-n1' data-row='$row'><i class='fa fa-edit'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.people.customer');
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
        $customer = Customer::find($id);

        $this->validate($request, [
            'eCustomerPassword'      => 'required',
            'eCustomerStatus' => 'required',
        ], [], [
            'eCustomerPassword'      => 'Customer Password',
            'eCustomerStatus'      => 'Customer Status',
        ]);

        $customer->customer_password   = $request->eCustomerPassword;
        $customer->customer_status  = $request->eCustomerStatus;
        $customer->save();

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
        Customer::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
