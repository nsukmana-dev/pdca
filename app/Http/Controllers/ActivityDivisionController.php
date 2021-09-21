<?php

namespace App\Http\Controllers;

use App\Models\ActivityDivision;
use App\Models\RealizationController;
use App\Models\StrategicPlanController;
use App\Models\StrategicDirection;
use App\Models\StrategicPriority;
use App\Models\StrategicPriorityDetail;
use App\Models\Division;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;

class ActivityDivisionController extends Controller
{
    public function index()
    {
        $ad = ActivityDivision::all();
        return view('ad.index')->with(['ad' => $ad]);
    }

    public function create()
    {
        $sd = StrategicDirection::where('active', 'Yes')->get();
        $div = Division::where('div_status', 1)->get();
        return view('ad.create')->with(['sd' => $sd, 'div' => $div]);
    }

    public function store(Request $request)
    {
        $rules = [
            'country_code' => 'required|unique:countries',
            'country_name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        
        $creator_id = Auth::user()->person_id;
        Country::create([
            'status' => '1',
            'sort' => '1',
            'modified_at' => Now(),
            'creator_id' => $creator_id,
            'modifier_id' => 0,
            'country_code' => $request['country_code'],
            'country_name' => $request['country_name']
        ]);

        return redirect('activity_division')->with('message', 'Success add new activity division');
    }

    public function show(Country $country)
    {
        //
    }

    public function edit($id)
    {
        $find = Country::find($id);
        return view('ad.edit')->with(['country' => $find]);
    }

    public function update(Request $request, $id)
    {
        $rules = [
            'country_name' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        } 

        $update = Country::find($id);
        $update->modified_at = now();
        $update->modifier_id = Auth::user()->person_id;
        $update->country_name = $request['country_name'];
        $update->save();

        return redirect('activity_division')->with('message', 'Success update this activity division');
    }

    public function destroy($id)
    {
        $delete = Country::find($id);
        $delete->delete();

        return redirect('activity_division')->with('message', 'Success delete this activity division');
    }
}
