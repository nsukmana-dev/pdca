@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master state province</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/stateprovince/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master stateprovince</h2>
    <p class="section-lead">Table of all master stateprovince.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>State province Code</th>
                <th>State province Name</th>
                <th>Country Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($stateprovince as $row)
            <tr>
                <td>{{$row->state_province_code}}</td>
                <td>{{$row->state_province_name}}</td>
                <td>{{$row->country_name}}</td>
                <td><a href="{{ url('master/stateprovince/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/stateprovince/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-master-stateprovince").addClass("active");
</script>
@endsection