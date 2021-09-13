@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Strategic direction</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('strategic_direction/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">strategic direction</h2>
    <p class="section-lead">Table of all strategic direction.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Year</th>
                <th>Strategic Direction</th>
                <th>Weight (%)</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($SD as $row)
            <tr>
                <td>{{$row->year}}</td>
                <td>{{$row->strategic_direction}}</td>
                <td>{{$row->weight}} %</td>
                <td>{{$row->active}}</td>
                <td><a href="{{ url('strategic_direction/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('strategic_direction/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
                </td>
            </tr>            
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
    $("#nav-strategic_direction").addClass("active");
</script>
@endsection