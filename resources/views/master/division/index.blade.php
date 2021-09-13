@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master division</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/division/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master division</h2>
    <p class="section-lead">Table of all master division.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Div id</th>
                <th>Div name</th>
                <th>Div status</th>
                <th>Div kode</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($division as $row)
            <tr>
                <td>{{$row['div_id']}}</td>
                <td>{{$row['div_name']}}</td>
                @if ($row['div_status'] == 1)
                    <td>Active</td>
                @else
                    <td>Non Active</td>
                @endif
                <td>{{$row['div_kode']}}</td>
                <td><a href="{{ url('master/division/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/division/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    // $("#nav-master").addClass("active");
    // $("#nav-master-division").addClass("active");
</script>
@endsection