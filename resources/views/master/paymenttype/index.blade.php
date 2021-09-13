@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master payment type</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/paymenttype/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master payment type</h2>
    <p class="section-lead">Table of all master payment type.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Payment type name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($paymenttype as $row)
            <tr>
                <td>{{$row['payment_type_name']}}</td>
                <td><a href="{{ url('master/paymenttype/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/paymenttype/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-master-paymenttype").addClass("active");
</script>
@endsection