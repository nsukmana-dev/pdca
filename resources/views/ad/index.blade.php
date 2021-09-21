@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Activity Division</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('activity_division/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Strategic direction</th>
                <th>Strategic priority</th>
                <th>Weight(%)</th>
                <th>Key result</th>
                <th>Activity</th>
                <th>Activity weight (%)</th>
                <th>Target</th>
                <th>Division</th>
                {{-- <th>Budget</th>
                <th>Related division</th>
                <th>Last update</th>
                <th>%Achievment</th>
                <th>Issue</th>
                <th>Action plan</th>
                <th>Action plan due date</th>
                <th>PICA status</th> --}}
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        {{-- @foreach ($country as $row)
            <tr>
                <td>{{$row['country_code']}}</td>
                <td>{{$row['country_name']}}</td>
                <td><a href="{{ url('activity_division/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('activity_division/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
                </td>
            </tr>            
        @endforeach --}}
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
</script>
@endsection