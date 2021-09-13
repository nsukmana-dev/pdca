@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master module package</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/modulepackage/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master module package</h2>
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
                <th>Module package Code</th>
                <th>Module package Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($modulepackage as $row)
            <tr>
                <td>{{$row['module_package_code']}}</td>
                <td>{{$row['module_package_name']}}</td>
                <td>{{$row['description']}}</td>
                <td><a href="{{ url('master/modulepackage/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/modulepackage/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-master-modulepackage").addClass("active");
</script>
@endsection