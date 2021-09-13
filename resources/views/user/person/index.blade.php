@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>User person</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('user/person/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">User person</h2>
    <p class="section-lead">Table of all user person.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th>First</th>
                <th>Middle</th>
                <th>Last</th>
                <th>City</th>
                <th>Province</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Code</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($person as $row)
            <tr>
                <td>{{ $row->first_name }}</td>
                <td>{{ $row->middle_name }}</td>
                <td>{{ $row->last_name }}</td>
                <td>{{ $row->city_name }}</td>
                <td>{{ $row->state_province_name }}</td>
                <td>{{ $row->email }}</td>
                <td>{{ $row->mobile_number }}</td>
                <td>{{ $row->national_identity_number }}</td>
                <td>
                    <a href="{{ url('user/person/detail/'.$row->id.'') }}" class="btn btn-success btn-sm">Detail</a> &nbsp; 
                    <a href="{{ url('user/person/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('user/person/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-user").addClass("active");
    $("#nav-user-person").addClass("active");
</script>
@endsection