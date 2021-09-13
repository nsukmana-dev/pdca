@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Voucher</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('voucher/voucher/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Voucher</h2>
    <p class="section-lead">Table of all product.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Voucher code</th>
                <th>Voucher name</th>
                <th>Voucher status</th>
                <th>Voucher type</th>
                <th>Currency</th>
                <th>Value</th>
                <th>Effective date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($voucher as $row)
            <tr>
                <td>{{$row->voucher_code}}</td>
                <td>{{$row->voucher_name}}</td>
                <td>{{$row->voucher_status}}</td>
                <td>{{$row->voucher_type_name}}</td>
                <td>{{$row->currency_code}}</td>
                <td>{{$row->value}}</td>
                <td>{{date('d M Y', strtotime($row->effective_date))}}</td>
                <td>
                    <a href="{{ url('voucher/voucher/detail/'.$row->id.'') }}" class="btn btn-success btn-sm">Detail</a> &nbsp;
                    <a href="{{ url('voucher/voucher/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp;
                    <a href="{{ url('voucher/voucher/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-voucher").addClass("active");
    $("#nav-voucher-voucher").addClass("active");
</script>
@endsection
