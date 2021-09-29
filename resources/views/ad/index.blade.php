@extends('layouts.master')

@section('content')
<script>
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>
<section class="section">
    <div class="section-header">
    <h1>Activity Division</h1>
    <div class="section-header-breadcrumb">
        {{-- <a href="{{ url('activity_division/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a> --}}
    </div>
    </div>
    
    <div class="section-body">
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="datatable" class="display compact" style="width:100%">
        <thead class="thead-info">
            <tr>
                <th>No</th>
                <th style="min-width:150px">Strategic direction</th>
                <th style="min-width:150px">Strategic priority</th>
                <th style="min-width:150px">Key result</th>
                <th style="min-width:150px">Activity</th>
                <th>Activity weight (%)</th>
                <th style="min-width:150px">Target</th>
                <th>Division</th>
                <th style="min-width:150px">Budget</th>
                <th>Related division</th>
                <th style="min-width:150px">Last update</th>
                <th>%Achievment</th>
                <th>Issue</th>
                <th>Action plan</th>
                <th style="min-width:150px">Action plan due date</th>
                <th>PICA status</th>
                <th>Action</th>
            </tr>
        </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($sd as $item)
                <tr>
                    <td class="text-primary">{{ $no }}</td>
                    <td>{{ $item->strategic_direction }}</td>
                    <td><a href="#" data-toggle="collapse" data-target="#tbl{{ $item->id }}">Detail</a></td>
                    <td><a href="#" data-toggle="collapse" data-target="#tbl{{ $item->id }}">Detail</a></td>
                    <td><a href="#" data-toggle="collapse" data-target="#tbl{{ $item->id }}">Detail</a></td>
                    <td class="text-primary" id="ActivityWeight{{$item->id}}">-</td>
                    <td><a href="#" data-toggle="collapse" data-target="#tbl{{ $item->id }}">Detail</a></td>
                    <td>{{ $item->div_name }}</td>
                    <td class="text-primary" id="budget{{$item->id}}">Rp. 0</td>
                    <td> <!-- Related division --> </td>
                    <td> <!-- Last update --> </td>
                    <td class="text-primary" id="achievement_last_year_weight{{$item->id}}"> <!-- %Achievment --> </td>
                    <td> <!-- Issue --> </td>
                    <td> <!-- Action plan --> </td>
                    <td> <!-- Action plan due date --> </td>
                    <td> <!-- PICA status --> </td>
                    <td> <!-- Action --> </td>
                </tr>
                    @php
                        $noside = 1;
                        $activityweight = 0;
                        $achievement_last_year_weight = 0;
                        $budget = 0;
                    @endphp
                    @foreach ($sp as $row)
                        @if ($item->id === $row->sd_id)
                        <tr id="tbl{{ $item->id }}" class="collapse">
                            <td>{{$no}}.{{$noside++}}</td>
                            <td align="center">
                                {{-- @if ($row->ad_id == NULL) --}}
                                @php
                                    $url = 0;
                                @endphp
                                {{-- @else
                                    @php
                                        $url = $row->ad_id;
                                    @endphp
                                @endif --}}
                                {{-- @if ($row->ad_id == '')
                                    <a href="{{ url('activity_division/insert/'.$item->id.'/'.$row->id.'/'.$row->spd_id.'/'.$url.'') }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>                                    
                                @endif --}}
                            </td>
                            <td>{{$row->strategic_priority}}</td>
                            <td>{{$row->key_result}}</td>
                            <td>{{$row->activity_division}}</td>
                            <td>{{$row->activity_weight == NULL ? 0 : $row->activity_weight}}%</td>
                            <td>{{$row->target_division}}</td>
                            <td>{{$row->div_name}}</td>
                            <td>Rp. {{number_format($row->budget,2,",",".")}}</td>
                            <td>{{$row->relate_division}}</td>
                            <td>{{$row->updated_at}}</td>
                            <td>{{$row->achievement_last_year_weight == NULL ? 0 : $row->achievement_last_year_weight}}%</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                @if ($row->ad_id == '')
                                    <a href="{{ url('activity_division/insert/'.$item->id.'/'.$row->id.'/'.$row->spd_id.'/'.$url.'') }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>                                    
                                @endif
                            </td>
                            @php
                                $activityweight += $row->activity_weight == NULL ? 0 : $row->activity_weight;
                                $budget += $row->budget;
                                $achievement_last_year_weight += $row->achievement_last_year_weight == NULL ? 0 : $row->achievement_last_year_weight;
                            @endphp
                            <script>
                                $("#ActivityWeight"+{{ $item->id }}).html({{ $activityweight }}+"%");
                                $("#achievement_last_year_weight"+{{ $item->id }}).html({{ $achievement_last_year_weight }}+"%");
                                $("#budget"+{{ $item->id }}).html("Rp. "+addCommas({{ $budget }}));
                            </script>
                        </tr>
                        @endif
                    @endforeach
                @php
                    $no++;
                @endphp
                @endforeach
            </tbody>
        </table>
        </div>
        </div>
        </div>
        </div>
    </div>
    </div>
</section>
<script>
    $("#nav-activity_division").addClass("active");
    var element = document.body;
    element.classList.add("sidebar-mini");
    $('#datatable').DataTable( {
        "bInfo" : false,
        "columnDefs": [
            { "width": "100px", "targets": "_all" }
        ]
    } );
    
</script>
@endsection