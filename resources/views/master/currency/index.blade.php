@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master currency</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/currency/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master currency</h2>
    <p class="section-lead">Table of all master currency.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>currency Code</th>
                <th>currency Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($currency as $row)
            <tr>
                <td>{{$row['currency_code']}}</td>
                <td>{{$row['currency_name']}}</td>
                <td><a href="{{ url('master/currency/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/currency/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-master-currency").addClass("active");
</script>
@endsection