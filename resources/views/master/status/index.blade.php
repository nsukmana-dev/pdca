@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master status</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/status/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master status</h2>
    <p class="section-lead">Table of all master status.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Status Code</th>
                <th>Status Name</th>
                <th>Internal status </th>
                <th>Consumer status </th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($status as $row)
            <tr>
                <td>{{$row['status_code']}}</td>
                <td>{{$row['status_name']}}</td>
                <td>{{$row['internal_status_name']}}</td>
                <td>{{$row['consumer_status_name']}}</td>
                <td><a href="{{ url('master/status/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/status/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-master-status").addClass("active");
</script>
@endsection