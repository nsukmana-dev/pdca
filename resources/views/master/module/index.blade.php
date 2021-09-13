@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master module</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/module/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master module</h2>
    <p class="section-lead">Table of all master module package.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Module Code</th>
                <th>Module Name</th>
                <th>Module package</th>
                <th>Path</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($module as $row)
            <tr>
                <td>{{$row->module_code}}</td>
                <td>{{$row->module_name}}</td>
                <td>{{$row->module_package_name}}</td>
                <td>{{$row->path}}</td>
                <td>{{$row->description}}</td>
                <td><a href="{{ url('master/module/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/module/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-master").addClass("active");
    $("#nav-master-module").addClass("active");
</script>
@endsection