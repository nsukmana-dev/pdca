<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Person;
use App\Models\UserTypeModule;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Hash;
use DB;

class UserController extends Controller
{
    public function index()
    {
        $User = User::all();
        return view('user.User.index')->with(['User' => $User]);
    }

    public function create()
    {
        $usertypemodule = DB::User->get();
        return view('user.User.create')->with(['usertypemodule' => $usertypemodule]);
    }

    public function store(Request $request)
    {
        $rules = [
            'nik' => 'required|unique:users',
            'username' => 'required|unique:users',
            'fullname' => 'required',
            'email' => 'required',
            'password' => 'required',
            'user_level' => 'required',
            'is_actived' => 'required',
            'user_level' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $creator_id = Auth::user()->person_id;
        // $password = Hash::make($request->input('password'));
        User::create([
            'nik' => $request['nik'],
            'username' => $request['username'],
            'fullname' => $request['fullname'],
            'email' => $request['email'],
            'password' => $request['password'],
            'user_level' => $request['user_level'],
            'is_actived' => $request['is_actived']
        ]);

        return redirect('user/User/')->with('message', 'Success add new user account');
    }

    public function show($id)
    {
        $find = User::find($id);

        return view('user.User.detail')->with(['User' => $find]);
    }

    public function edit($id)
    {
        $User = User::find($id);
        return view('user.User.edit')->with(['User' => $User]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'user_type_id' => 'required',
            'module_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        } 

        $update = User::find($id);
        $update->modified_at = now();
        $update->modifier_id = Auth::user()->person_id;
        $update->user_type_id = $request['user_type_id'];
        $update->module_id = $request['module_id'];
        $update->save();

        return redirect('user/User/')->with('message', 'Success update this user account');
    }

    public function destroy($id)
    {
        $delete = User::find($id);
        $delete->delete();

        return redirect('user/User/')->with('message', 'Success delete this user account');
    }
}
