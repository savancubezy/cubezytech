<?php

namespace App\Http\Controllers;

use App\Models\LeavingApplication;
use App\Models\Member;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class HomeController extends Controller
{
    public function index()
    {
        $empl = User::where('user_type','employee')->get();
        $cnt = count($empl);
        $leaapp = LeavingApplication::where('status','0')->get();
        $cnt2 = count($leaapp);
        $nots = Notice::all();
        return view('index',compact('cnt','cnt2','nots'));
    }

    public function login()
    {
        return view('loginpage');
    }

    public function login_sub(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->route('index');
        }else{
            return redirect()->back()->with('ERROR','Invalid Id Password');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('index');
    }

    public function register()
    {
        return view('register');
    }

    public function reg_store(Request $request)
    {
        // dd($request->all());

        if($request->id == '0'){
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required|unique:Users,email',
                'password' => 'required',
                'phone_no' => 'required',
                'image' => 'required',
            ]);
        }else{
            $validate = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'phone_no' => 'required',
                'image' => 'required',
            ]);
        }

        

        if($request->id == '0'){
            $pw = Hash::make($request->password);
        }else{
            $pw = $request->password;
        }

        if($request->file('image')){
            $new = "IMG".time().".JPG";

            $request->image->move('image',$new);
        }else{
            $new = $request->image;
        }

        $data = User::updateOrCreate([
            'id' => $request->id,
        ],[
            'name' => $request->name,
            // 'user_type' => $request->user_type,
            'user_type' => 'employee',
            'email' => $request->email,
            'password' => $pw,
            'phone_no' => $request->phone_no,
            'image' => $new,
        ]);

        if($request->id == '0'){
            return redirect()->route('login')->with('SUCCESS','Register Your Profile Successfully');
        }else{
            return redirect()->route('operationemployee')->with('SUCCESS','Edit Your Profile Successfully');
        }

    }
}
