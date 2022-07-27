<?php

namespace App\Http\Controllers;

use App\Models\LeaveRecord;
use App\Models\LeavingApplication;
use App\Models\Member;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeaveController extends Controller
{
    public function index()
    {
        $apps = LeavingApplication::where('status',0)->get();

        $i=1;
        return view('leaving_application',compact('apps','i'));
    }

    public function deleteapp(Request $request)
    {
        // dd($request->all());
        $deleteapp = LeavingApplication::find($request->id);
        $em = $deleteapp->email;
        $deleteapp->status = '2';
        $deleteapp->save();

        $reasonreject = $request->rejectreason;

        $details = [
            'title' => 'Leave Application Update',
            'body' => 'Reject Of Leave Application For Thease Reason '.$reasonreject,
        ];
       
        Mail::to($em)->send(new \App\Mail\MyTestMail($details));

        // return redirect()->back()->with('SUCCESS','Reject The Leave Application Successfully');
        return true;
    }

    public function acceptapp(Request $request)
    {
        // dd($request->all());
        $acceptapp = LeavingApplication::find($request->id);
        $em = $acceptapp->email;

        $appmem = User::where('email',$em)->first();
        // dd($appmem);
        $data = LeaveRecord::create([
            'user_id' => $appmem->id,
            'leave_day' => $acceptapp->day,
            'leave_datefrom' => $acceptapp->from,
            'leave_dateto' => $acceptapp->to,
            'leave_total_days' => $acceptapp->total_days,
        ]);

        $acceptapp->status = '1';
        $acceptapp->save();

        $appmem->total_leaves = $appmem->total_leaves - $acceptapp->total_days;
        $appmem->save();

        $details = [
            'title' => 'Leave Application Update',
            'body' => 'Accept Your Leave Application'
        ];
       
        Mail::to($em)->send(new \App\Mail\MyTestMail($details));


        return true;
    }
}
