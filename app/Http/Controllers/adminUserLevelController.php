<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\UserLevel;
use Yajra\Datatables\Datatables;

class adminUserLevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.settings.userLevel');
    }

    public function list(Request $request)
    {
        if ($request->ajax()) {
            $data = UserLevel::select('user_level_id', 'user_level_name');
            return (new Datatables)->eloquent($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = "<button id='delete' value='$row->user_level_id' class='btn float-end mt-n1 delete'><a title='Delete' class='delete text-secondary btn-md'><i class='fa fa-trash'></i></a></button>";
                        $btn = $btn."<button id='edit' class='btn float-end mt-n1 edit' data-row='$row'><i class='fa fa-edit'></i></button>";
                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('admin.settings.userLevel');
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
            'userLevelName'                          => 'required',
        ]);
        $products = new UserLevel;
        $products->user_level_name                    = $request['userLevelName'];
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
        $userLevel = UserLevel::find($id);
        $this->validate($request, [
            'eUserLevelName'      => 'required',
        ], [], [
            'eUserLevelName'      => 'Order Status Name',
        ]);
        $userLevel->user_level_name   = $request->eUserLevelName;
        $userLevel->save();
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
        UserLevel::find($id)->delete();
        return json_encode(array('statusCode'=>200));
    }
}
