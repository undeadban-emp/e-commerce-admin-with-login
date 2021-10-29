<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customer;
use Yajra\Datatables\Datatables;

class AdminPeopleCustomerApi extends Controller
{
    public function list(Request $request, $customer_status)
    {
        if ($request->ajax()) {
            $data = Customer::select('customer_id', 'customer_name', 'customer_email', 'customer_gender', 'customer_birthdate', 'customer_contact_no', 'customer_province', 'customer_municipal', 'customer_barangay', 'customer_purok_street', 'customer_no_of_orders', 'customer_username', 'customer_password', 'customer_status')->where('customer_status', $customer_status);
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
}
