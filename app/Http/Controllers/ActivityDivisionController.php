<?php

namespace App\Http\Controllers;

use App\Models\ActivityDivision;
use App\Models\RealizationController;
use App\Models\StrategicPlanController;
use App\Models\StrategicDirection;
use App\Models\StrategicPriority;
use App\Models\StrategicPriorityDetail;
use App\Models\Division;
use App\Models\Departemen;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Session;
use DB;

class ActivityDivisionController extends Controller
{
    public function index()
    {
        // $sp = DB::table('strategic_priorities')
        // ->join('divisions', 'strategic_priorities.div_id', '=', 'divisions.div_id')
        // ->join('strategic_directions', 'strategic_priorities.sd_id', '=', 'strategic_directions.id')
        // ->select('strategic_priorities.*', 'divisions.div_name', 'strategic_directions.strategic_direction')
        // ->get();

        $sd = DB::table('strategic_directions as a')
        ->LEFTJOIN('strategic_priorities as b', 'a.id', '=', 'b.sd_id')
        ->LEFTJOIN('divisions as c', 'b.div_id', '=', 'c.div_id')
        ->SELECT('a.*', 'b.remain', 'c.div_name')
        ->get()->toArray();
        $idarr = array();
        foreach($sd as $row){
            $idarr[] = $row->id;
        }
        // dd($idarr);
        $sp = DB::table('strategic_priorities as a')
        ->JOIN('strategic_priority_details as b', 'a.id', '=', 'b.sp_id')
        ->JOIN('divisions as c', 'a.div_id', '=', 'c.div_id')
        ->SELECT('a.*', 'b.strategic_priority', 'b.key_result', 'b.weight', 'c.div_name')
        ->whereIn('a.sd_id', $idarr)
        ->where('a.div_id', '=', Auth::user()->division)
        ->where('b.active', '=', 'Y')->get()->toArray();
        // dd($sp);
        $ad = ActivityDivision::all();
        return view('ad.index')->with(['sd' => $sd, 'sp' => $sp, 'ad' => $ad]);
    }

    public function insert($sd_id, $sp_id, $ad_id)
    {
       if ($ad_id == 0) {
        return redirect('activity_division/addnew/'.$sd_id.'/'.$sp_id);
       }

       $sd = DB::table('strategic_directions as a')
        ->LEFTJOIN('strategic_priorities as b', 'a.id', '=', 'b.sd_id')
        ->LEFTJOIN('divisions as c', 'b.div_id', '=', 'c.div_id')
        ->SELECT('a.*', 'b.remain', 'c.div_name')
        ->get()->toArray();
    }

    public function addnew ($sd_id, $sp_id)
    {
        $sd = DB::table('strategic_directions as a')
        ->LEFTJOIN('strategic_priorities as b', 'a.id', '=', 'b.sd_id')
        ->LEFTJOIN('divisions as c', 'b.div_id', '=', 'c.div_id')
        ->SELECT('a.*', 'b.remain', 'c.div_name')
        ->get()->toArray();

        $sp = DB::table('strategic_priorities as a')
        ->JOIN('strategic_priority_details as b', 'a.id', '=', 'b.sp_id')
        ->JOIN('divisions as c', 'a.div_id', '=', 'c.div_id')
        ->SELECT('a.*', 'b.strategic_priority', 'b.key_result', 'b.weight', 'c.div_name')
        ->whereIn('a.sd_id', $sp_id)
        ->where('a.div_id', '=', Auth::user()->division)
        ->where('b.active', '=', 'Y')->get()->toArray();
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
        
        $creator_id = Auth::user()->nik;
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
