<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;

class DivisionController extends Controller
{
    public function index()
    {
        $division = Division::all();
        return view('master.division.index')->with(['division' => $division]);
    }

    public function create()
    {
        return view('master.division.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'div_id' => 'required|unique:divisions',
            'div_name' => 'required',
            'div_status' => 'required',
            'div_kode' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $creator_id = Auth::user()->nik;
        Division::create([
            'div_id' => $request['div_id'],
            'div_name' => $request['div_name'],
            'div_status' => $request['div_status'],
            'div_kode' => $request['div_kode']
        ]);

        return redirect('master/division/')->with('message', 'Success add new division');
    }

    public function show(Division $Division)
    {
        //
    }

    public function edit($id)
    {
        $find = Division::find($id);
        return view('master.division.edit')->with(['division' => $find]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'div_name' => 'required',
            'div_status' => 'required',
            'div_kode' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        } 

        $update = Division::find($id);
        $update->div_name = $request['div_name'];
        $update->div_status = $request['div_status'];
        $update->div_kode = $request['div_kode'];
        $update->save();

        return redirect('master/division/')->with('message', 'Success update this division');
    }

    public function destroy($id)
    {
        $delete = Division::find($id);
        $delete->delete();

        return redirect('master/division/')->with('message', 'Success delete this division');
    }
}
