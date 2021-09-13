@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>User Account</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('user/useraccount/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">User account</h2>
    <p class="section-lead">Table of all user account.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display compact" style="width:100%">
        <thead>
            <tr>
                <th>Login ID</th>
                <th>Name</th>
                <th>Member number</th>
                <th>Active</th>
                <th>Superuser</th>
                <th>User type</th>
                <th>Profile name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($useraccount as $row)
            <tr>
                <td>{{ $row->login }}</td>
                <td>{{ $row->first_name }} {{ $row->middle_name }} {{ $row->last_name }}</td>
                <td>{{ $row->member_number }}</td>
                <td>{{ $row->is_activated == '1' ? 'Yes' : 'No' }}</td>
                <td>{{ $row->is_superuser == '1' ? 'Yes' : 'No' }}</td>
                <td>{{ $row->user_type_name }}</td>
                <td>{{ $row->user_profile_file_name }}</td>
                <td>
                    <a href="{{ url('user/useraccount/detail/'.$row->id.'') }}" class="btn btn-success btn-sm">Detail</a> &nbsp; 
                    <!--<a href="{{ url('user/useraccount/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; -->
                    <a href="{{ url('user/useraccount/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-user-useraccount").addClass("active");
</script>
@endsection