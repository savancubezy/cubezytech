<?php

namespace App\Http\Controllers;

use App\Models\LeaveRecord;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function viewdata()
    {
        $data = User::where('user_type','employee')->get();

        $i=1;
        return view('viewdata',compact('data','i'));
    }

    public function viewmore($id)
    {
        // dd($request->all());
        $viewmore = User::with('leavedetails')->where('id',$id)->first();
        $i =1;
        return view('viewleave',compact('viewmore','i'));
    }

    public function monleav()
    {

        $monthlys = LeaveRecord::with('username')->orderBy('leave_datefrom','asc')->get();

        $i=1;
        return view('monthlyleave',compact('monthlys','i'));
    }

    public function sermonstore(Request $request)
    {
        $validate = $request->validate([
            'fromser' => 'required',
            'toser' => 'required',
        ]);

        $fromser = $request->fromser;
        $toser = $request->toser;

        // $monthlys = LeaveRecord::where('leave_datefrom',$request->fromser)->where('leave_dateto',$request->toser)->with('username')->orderBy('leave_datefrom','asc')->get();
        $monthsers = LeaveRecord::whereBetween('leave_datefrom',[$fromser,$toser])->with('username')->orderBy('leave_datefrom','asc')->get();

        $i=1;
        return view('monthlyleaveserres',compact('monthsers','i'));
    }
}
