<?php

namespace App\Http\Controllers;

use App\Models\LeaveRecord;
use App\Models\LeavingApplication;
use App\Models\User;
use Illuminate\Http\Request;

class OperationidController extends Controller
{
    public function views()
    {
        $datas = User::where('user_type','employee')->get();
        $i=1;
        return view('operationid',compact('datas','i'));
    }

    public function delempid(Request $request)
    {
        // dd($request->all());

        $delempid = User::where('id',$request->id)->delete();
        // dd($delempid);

        $appdelempid = LeavingApplication::where('email',$request->email)->delete();
        // dd($appdelempid);

        $recdelempid = LeaveRecord::where('user_id',$request->id)->delete();
        // dd($recdelempid);

        return true;
    }

    public function editempid($id)
    {
        $editdata = User::find($id);
        
        return view('register',compact('editdata'));
    }
}
