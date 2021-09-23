@extends('layouts.master')

@section('content')
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
                <th>Target</th>
                <th>Division</th>
                <th>Budget</th>
                <th>Related division</th>
                <th>Last update</th>
                <th>%Achievment</th>
                <th>Issue</th>
                <th>Action plan</th>
                <th>Action plan due date</th>
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
                    <td class="text-primary">{{ 100-$item->remain }}%</td>
                    <td><a href="#" data-toggle="collapse" data-target="#tbl{{ $item->id }}">Detail</a></td>
                    <td>{{ $item->div_name }}</td>
                    <td>Rp. 0</td>
                    <td> <!-- Related division --> </td>
                    <td> <!-- Last update --> </td>
                    <td> <!-- %Achievment --> </td>
                    <td> <!-- Issue --> </td>
                    <td> <!-- Action plan --> </td>
                    <td> <!-- Action plan due date --> </td>
                    <td> <!-- PICA status --> </td>
                    <td> <!-- Action --> </td>
                </tr>
                    @php
                        $noside = 1;
                    @endphp
                    @foreach ($sp as $row)
                        @if ($item->id === $row->sd_id)
                        <tr id="tbl{{ $item->id }}" class="collapse">
                            <td>{{$no}}.{{$noside++}}</td>
                            <td></td>
                            <td>{{$row->strategic_priority}}</td>
                            <td>{{$row->key_result}}</td>
                            <td></td>
                            <td>{{$row->weight}}%</td>
                            <td></td>
                            <td>{{$row->div_name}}</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                {{-- @if ($row->ad_id == NULL) --}}
                                    @php
                                        $url = 0;
                                    @endphp
                                {{-- @else
                                    @php
                                        $url = $row->ad_id;
                                    @endphp
                                @endif --}}
                                <a href="{{ url('activity_division/insert/'.$item->id.'/'.$row->id.'/'.$url.'') }}" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>
                            </td>
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
        "columnDefs": [
            { "width": "100px", "targets": "_all" }
        ]
    } );
</script>
@endsection