<?php

namespace App\Http\Controllers;

use App\Models\Departemen;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;

class DepartemenController extends Controller
{
    public function index()
    {
        $plant = DB::connection('sqlsrv2')->select("select * from tlkp_plant");
        $departemen = Departemen::
        leftjoin('divisions', 'divisions.id', '=', 'departemens.div_id')
        ->select('departemens.*', 'divisions.div_name')
        ->where('divisions.div_status', '=', '1')
        ->get();
        return view('master.departemen.index')->with(['departemen' => $departemen, 'plant' => $plant]);
    }

    public function create()
    {
        $plant = DB::connection('sqlsrv2')->select("select * from tlkp_plant");
        $div = Division::where('div_status', 1)->get();
        return view('master.departemen.create')->with(['plant' => $plant, 'div' => $div]);
    }

    public function store(Request $request)
    {
        $rules = [
            'dep_id' => 'required|unique:departemens',
            'dep_name' => 'required',
            'dep_status' => 'required',
            'plant_id' => 'required',
            'dep_head' => 'required',
            'dep_kode' => 'required',
            'div_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $creator_id = Auth::user()->nik;
        Departemen::create([
            'dep_id' => $request['dep_id'],
            'dep_name' => $request['dep_name'],
            'dep_status' => $request['dep_status'],
            'plant_id' => $request['plant_id'],
            'dep_head' => $request['dep_head'],
            'dep_kode' => $request['dep_kode'],
            'div_id' => $request['div_id']
        ]);
        // dd($request->all());

        return redirect('master/departemen/')->with('message', 'Success add new departemen');
    }

    public function show(Departemen $Departemen)
    {
        
    }

    public function edit($id)
    {
        $find = Departemen::find($id);
        $plant = DB::connection('sqlsrv2')->select("select * from tlkp_plant");
        $div = Division::where('div_status', 1)->get();
        return view('master.departemen.edit')->with(['departemen' => $find, 'plant' => $plant, 'div' => $div]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'dep_name' => 'required',
            'dep_status' => 'required',
            'plant_id' => 'required',
            'dep_head' => 'required',
            'dep_kode' => 'required',
            'div_id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        } 

        $update = Departemen::find($id);
        $update->dep_name = $request['dep_name'];
        $update->dep_status = $request['dep_status'];
        $update->plant_id = $request['plant_id'];
        $update->dep_head = $request['dep_head'];
        $update->dep_kode = $request['dep_kode'];
        $update->div_id = $request['div_id'];
        $update->save();

        return redirect('master/departemen/')->with('message', 'Success update this departemen');
    }

    public function destroy($id)
    {
        $delete = Departemen::find($id);
        $delete->delete();

        return redirect('master/departemen/')->with('message', 'Success delete this departemen');
    }
}
