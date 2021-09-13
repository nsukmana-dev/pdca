@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master picture category</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/picturecategory/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master picture category</h2>
    <p class="section-lead">Table of all master picture category.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Picture category code</th>
                <th>Picture category name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($picturecategory as $row)
            <tr>
                <td>{{$row['picture_category_code']}}</td>
                <td>{{$row['picture_category_name']}}</td>
                <td><a href="{{ url('master/picturecategory/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/picturecategory/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-master-picturecategory").addClass("active");
</script>
@endsection