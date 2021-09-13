@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Product type</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('product/producttype/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Product</h2>
    <p class="section-lead">Table of all product type.</p>
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Product code</th>
                <th>Product name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($producttype as $row)
          <tr>
              <td>{{$row->product_type_code}}</td>
              <td>{{$row->product_type_name}}</td>
              <td>
                  <a href="{{ url('product/producttype/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp;
                  <a href="{{ url('product/producttype/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-product-producttype").addClass("active");
</script>
@endsection
