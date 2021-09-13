@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Product</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('product/product/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">product</h2>
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
                <th>Product name</th>
                <th>Product status</th>
                <th>Currency</th>
                <th>Value</th>
                <th>Price</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($product as $row)
            <tr>
                <td>{{$row->product_name}}</td>
                <td>{{$row->product_status}}</td>
                <td>{{$row->currency_code}}</td>
                <td>{{$row->value}}</td>
                <td>{{$row->price}}</td>
                <td>
                    <a href="{{ url('product/product/detail/'.$row->id.'') }}" class="btn btn-success btn-sm">Detail</a> &nbsp;
                    <a href="{{ url('product/product/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp;
                    <a href="{{ url('product/product/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-product").addClass("active");
    $("#nav-product-product").addClass("active");
</script>
@endsection
