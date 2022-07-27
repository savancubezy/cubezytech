<?php

namespace App\Http\Controllers;

use App\Models\LeaveRecord;
use App\Models\LeavingApplication;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Psy\CodeCleaner\LeavePsyshAlonePass;

class Home2Controller extends Controller
{
    public function index()
    {
        $remleav = User::find(auth()->user()->id);
        $tot = $remleav->total_leaves;
        $nots = Notice::all();
        return view('indexemp',compact('tot','nots'));
    }

    public function form()
    {
        return view('appform');
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'day' => 'required',
            'from' => 'required',
            'to' => 'required',
            'totaldays' => 'required',
            'reason' => 'required',
        ],[
            'day.required' => 'Select The Day',
            'from.required' => 'Select The Date of From',
            'to.required' => 'Select The Date Of To',
            'totaldays.required' => 'Enter The Total Days',
            'reason.required' => 'Please Select The Reason',
        ]);
     
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()->all()]);
        }

        // $to = $request->to;
        // $from = $request->from;
        // $totalday = date_diff($from,$to);


        if($request->reasonother != null){
            $data = LeavingApplication::create([
                'name' => $request->name,
                'email' => $request->email,
                'day' => $request->day,
                'from' => $request->from,
                'to' => $request->to,
                'total_days' => $request->totaldays,
                'reason' => $request->reasonother,
            ]);
        }else{
            $data = LeavingApplication::create([
                'name' => $request->name,
                'email' => $request->email,
                'day' => $request->day,
                'from' => $request->from,
                'to' => $request->to,
                'total_days' => $request->totaldays,
                'reason' => $request->reason,
            ]);
        }

        $details = [
            'title' => 'Leave Application Update',
            'body' => 'Received Leave Application From Employees'
        ];
       
        Mail::to('savan.cubezy@gmail.com')->send(new \App\Mail\MyTestMail($details));
       
        return true;
    }

    public function viewmyleaves()
    {
        $leaves = LeaveRecord::where('user_id',auth()->user()->id)->orderBy('leave_datefrom','asc')->get();
        $i=1;
        return view('viewmytotalleaves',compact('leaves','i'));
    }

    public function viewappupdate()
    {
        $appups = LeavingApplication::where('email',auth()->user()->email)->get();
        $i=1;
        return view('viewappupdate',compact('appups','i'));
    }
}
