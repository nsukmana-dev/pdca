@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Product Voucher type</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('product/productvouchertype/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Product voucher type</h2>
    <p class="section-lead">Table of all product voucher type.</p>
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
                <th>Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($productvouchertype as $row)
          <tr>
              <td>{{$row->product_name}}</td>
              <td>{{$row->voucher_type_name}}</td>
              <td>{{$row->quantity}}</td>
              <td>
                  <a href="{{ url('product/productvouchertype/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp;
                  <a href="{{ url('product/productvouchertype/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
    $("#nav-product-productvouchertype").addClass("active");
</script>
@endsection
