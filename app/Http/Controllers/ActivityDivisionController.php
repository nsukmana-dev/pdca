<?php

namespace App\Http\Controllers;

use App\Models\ActivityDivision;
use App\Models\Realization;
use App\Models\StrategicPlan;
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

    public function addnew($sd_id, $sp_id)
    {
        $div = Division::where('div_status', 1)->get();
        $sd = DB::table('strategic_directions as a')
        ->JOIN('strategic_priorities as b', 'a.id', '=', 'b.sd_id')
        ->JOIN('divisions as c', 'b.div_id', '=', 'c.div_id')
        ->SELECT('a.*', 'b.div_id', 'b.remain', 'c.div_name')
        ->where('a.id', '=', $sd_id)
        ->first();

        $sp = DB::table('strategic_priorities as a')
        ->JOIN('strategic_priority_details as b', 'a.id', '=', 'b.sp_id')
        ->JOIN('divisions as c', 'a.div_id', '=', 'c.div_id')
        ->SELECT('a.*', 'b.strategic_priority', 'b.key_result', 'b.weight', 'c.div_name')
        ->where('a.sd_id', '=', $sp_id)
        ->where('a.div_id', '=', Auth::user()->division)
        ->where('b.active', '=', 'Y')->first();

        $ad_id = time();
        return view('ad.create')->with(['sd' => $sd, 'sp' => $sp, 'div' => $div, 'ad_id' => $ad_id]);
    }

    public function finddetailsp(Request $request)
    {
        $jml = date("n", strtotime($request['month']));
        $year = date("Y", strtotime($request['year']));
        $ad_id = $request['ad_id'];

        return view("ad.sp")->with(['jml' => $jml, 'year' => $year, 'ad_id' => $ad_id]);
    }

    public function finddetailrealization(Request $request)
    {
        $jml = date("n", strtotime($request['month']));
        $year = date("Y", strtotime($request['year']));
        $ad_id = $request['ad_id'];

        return view("ad.real")->with(['jml' => $jml, 'year' => $year, 'ad_id' => $ad_id]);
    }

    public function create()
    {
        $sd = StrategicDirection::where('active', 'Yes')->get();
        $div = Division::where('div_status', 1)->get();
        return view('ad.create')->with(['sd' => $sd, 'div' => $div]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $rules = [
            'ad_id' => 'required|unique:activity_divisions',
            'year' => 'required',
            'div_id' => 'required',
            'sd_id' => 'required',
            'sp_id' => 'required',
            'activity_division' => 'required',
            'target_division' => 'required',
            'activity_weight' => 'required',
            'budget' => 'required',
            // 'relate_division' => 'required',
            'due_date_activity' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $jml = count($request['strategic_plan_id']);
        $sparr = array();
        $realarr = array();
        for ($i=0; $i < $jml; $i++) { 
            $sparr[$i]['ad_id'] = $request['ad_id'];
            $sparr[$i]['strategic_plan_id'] = $request['strategic_plan_id'][$i];
            $sparr[$i]['periode'] = $request['periode'][$i]."-01";
            $sparr[$i]['target'] = $request['target'][$i];
            $sparr[$i]['weight'] = $request['weight'][$i];

            $realarr[$i]['strategic_plan_id'] = $request['strategic_plan_id'][$i];
            $realarr[$i]['actual'] = $request['actual'][$i];
            $realarr[$i]['realization'] = $request['realization'][$i];
            $realarr[$i]['to_target'] = $request['to_target'][$i];
            $realarr[$i]['issue'] = $request['issue'][$i];
            $realarr[$i]['action_plan'] = $request['action_plan'][$i];
            $realarr[$i]['due_date_action_plan'] = $request['due_date_action_plan'][$i];
            $realarr[$i]['PIC'] = $request['PIC'][$i];
            $realarr[$i]['pica_attachment'] = $request['pica_attachment'][$i];
            $realarr[$i]['pica_status'] = $request['pica_status'][$i];
        }
        // dd($realarr);

        $relate_division = implode(",", $request['related_division']);
        $creator_id = Auth::user()->nik;
        ActivityDivision::create([
            'ad_id' => $request['ad_id'],
            'year' => $request['year'],
            'div_id' => $request['div_id'],
            'sd_id' => $request['sd_id'],
            'sp_id' => $request['sp_id'],
            'activity_division' => $request['activity_division'],
            'target_division' => $request['target_division'],
            'activity_weight' => $request['activity_weight'],
            'budget' => $request['budget'],
            'relate_division' => $relate_division,
            'due_date_activity' => $request['due_date_activity'],
            'achievement_last_year' => $request['achievement_last_year'],
            'achievement_last_year_weight' => $request['achievement_last_year_weight'],
            'status' => 'Y',
            'created_by' => $creator_id,
        ]);
        StrategicPlan::insert($sparr);
        Realization::insert($realarr);

        return redirect('activity_division')->with('message', 'Success add activity division');
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
