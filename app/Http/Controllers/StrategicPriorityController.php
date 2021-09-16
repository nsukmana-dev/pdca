<?php

namespace App\Http\Controllers;

use App\Models\StrategicPriority;
use App\Models\StrategicPriorityDetail;
use App\Models\StrategicDirection;
use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use Hash;
use DB;

class StrategicPriorityController extends Controller
{
    public function index()
    {
        $sp = DB::table('strategic_priorities')
        ->join('divisions', 'strategic_priorities.div_id', '=', 'divisions.div_id')
        ->join('strategic_directions', 'strategic_priorities.sd_id', '=', 'strategic_directions.id')
        ->select('strategic_priorities.*', 'divisions.div_name', 'strategic_directions.strategic_direction')
        ->get();
        //  dd($sp);
        return view('sp.index')->with(['sp' => $sp]);
    }

    public function create()
    {
        $sd = StrategicDirection::where('active', 'Yes')->get();
        $div = Division::where('div_status', 1)->get();
        return view('sp.create')->with(['sd' => $sd, 'div' => $div]);
    }

    public function store(Request $request)
    {
        
        $rules = [
            'year' => 'required',
            'div_id' => 'required',
            'sd_id' => 'required',
            'remain' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules, $messages = [
            'year' => 'The year field is required',
            'div_id' => 'The division field is required',
            'sd_id' => 'The strategic directions field is required',
            'remain' => 'The remain field is required'
        ]);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
        // dd($request);
        
        $year = $request['year'];
        $div_id = $request['div_id'];
        $sd_id = $request['sd_id'];
        $remain = $request['remain'];
        $creator_id = Auth::user()->nik;

        StrategicPriority::create([
            'year' => $request['year'],
            'div_id' => $request['div_id'],
            'sd_id' => $request['sd_id'],
            'remain' => $request['remain'],
            'created_by' => $creator_id
        ]);
        
        $count = count($request['weight']) - 1;
        $sp = StrategicPriority::where([
            ['year', '=', $year],
            ['div_id', '=', $div_id],
            ['sd_id', '=', $sd_id],
            ['remain', '=', $remain],
            ['created_by', '=', $creator_id]
        ])->first();

        $dataSet = [];
        for ($i=0; $i <= $count; $i++) { 
            $dataSet[] = [
                'sp_id'             => $sp['id'],
                'strategic_priority'=> $request['strategic_priority'][$i],
                'key_result'        => $request['key_result'][$i],
                'weight'            => $request['weight'][$i],
                'active'            => $request['active'][$i],
            ];
        }
        StrategicPriorityDetail::insert($dataSet);
        return redirect('strategic_priority')->with('message', 'Success add new strategic priority');
    }

    public function show(Country $country)
    {
        //
    }

    public function edit($id)
    {
        $find = Country::find($id);
        return view('sp.edit')->with(['country' => $find]);
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
        $update->modifier_id = Auth::user()->nik;
        $update->country_name = $request['country_name'];
        $update->save();

        return redirect('master/country/')->with('message', 'Success update this country');
    }

    public function destroy($id)
    {
        $delete = Country::find($id);
        $delete->delete();

        return redirect('master/country/')->with('message', 'Success delete this country');
    }

    public function finddetail(Request $request)
    {
        $id = $request['id'];
        $sp = DB::table('strategic_priorities')
        ->join('divisions', 'strategic_priorities.div_id', '=', 'divisions.div_id')
        ->join('strategic_directions', 'strategic_priorities.sd_id', '=', 'strategic_directions.id')
        ->select('strategic_priorities.*', 'divisions.div_name', 'strategic_directions.strategic_direction')
        ->where('strategic_priorities.id', '=', $id)
        ->first();

        $spdetail = StrategicPriorityDetail::where('sp_id', $id)->get();
        return view('sp.table')->with(['spt' => $sp, 'spdetail' => $spdetail]);
    }
}
