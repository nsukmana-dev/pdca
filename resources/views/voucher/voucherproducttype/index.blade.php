@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Voucher product type</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('voucher/voucherproducttype/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Voucher product type</h2>
    <p class="section-lead">Table of all Voucher product type.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Voucher</th>
                <th>Product</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($voucherproducttype as $row)
            <tr>
                <td>{{$row->voucher_name}}</td>
                <td>{{$row->product_type_name}}</td>
                <td>
                    <a href="{{ url('voucher/voucherproducttype/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp;
                    <a href="{{ url('voucher/voucherproducttype/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-voucher-voucherproducttype").addClass("active");
</script>
@endsection
