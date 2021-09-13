<?php

namespace App\Http\Controllers;

use App\Models\StrategicDirection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Hash;
use DB;

class StrategicDirectionController extends Controller
{
    public function index()
    {
        $SD = StrategicDirection::all();
        return view('sd.index')->with(['SD' => $SD]);
    }

    public function create()
    {
        return view('sd.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'year' => 'required',
            'strategic_direction' => 'required',
            'weight' => 'required',
            'active' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $creator_id = Auth::user()->nik;
        StrategicDirection::create([
            'year' => $request['year'],
            'strategic_direction' => $request['strategic_direction'],
            'weight' => $request['weight'],
            'active' => $request['active'],
            'created_by' => $creator_id
        ]);

        return redirect('strategic_direction')->with('message', 'Success add new Strategic Direction');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $SD = StrategicDirection::find($id);
        return view('sd.edit')->with(['sd' => $SD]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'year' => 'required',
            'strategic_direction' => 'required',
            'weight' => 'required',
            'active' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $update = StrategicDirection::find($id);
        $update->year = $request['year'];
        $update->strategic_direction = $request['strategic_direction'];
        $update->weight = $request['weight'];
        $update->active = $request['active'];
        $update->created_by = Auth::user()->nik;
        $update->save();

        return redirect('strategic_direction')->with('message', 'Success update this strategic direction');
    }

    public function destroy($id)
    {
        $delete = StrategicDirection::find($id);
        $delete->delete();

        return redirect('strategic_direction')->with('message', 'Success delete this strategic direction');
    }
}
