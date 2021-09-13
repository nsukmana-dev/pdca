@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>User type</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('user/usertype/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">User type</h2>
    <p class="section-lead">Table of all user type.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>User type Code</th>
                <th>User type Name</th>
                <th>Is System</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($usertype as $row)
            <tr>
                <td>{{$row['user_type_code']}}</td>
                <td>{{$row['user_type_name']}}</td>
                <td>{{$row['is_system']}}</td>
                <td><a href="{{ url('user/usertype/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('user/usertype/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-user-usertype").addClass("active");
</script>
@endsection