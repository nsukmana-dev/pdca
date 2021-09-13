@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>voucher type Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('voucher/vouchertype') }}"><span class="badge badge-success">voucher type Home</span></a>
    </div>
    </div>

    @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Something it's wrong:
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    @if (Session::has('error'))
        <div class="alert alert-danger">
            {{ Session::get('error') }}
        </div>
    @endif

    <div class="row">
        <div class="col-12 col-md-6 col-lg-6">
        <div class="card">
            <form method="POST" action="{{ url('voucher/vouchertypeproducttype/store') }}">
            @csrf
            <div class="card-header">
                <h4>Form Input product type</h4>
            </div>
            <div class="card-body">

                <div class="form-group">
                <label>Voucher Type Name</label>
                <select name="voucher_type_id" id="voucher_type_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($voucher as $row)
                <option value="{{ $row['id'] }}">{{ $row['voucher_type_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Product Type Name</label>
                <select name="product_type_id" id="product_type_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($producttype as $row)
                <option value="{{ $row['id'] }}">{{ $row['product_type_name'] }}</option>
                @endforeach
                </select>
                </div>

            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Simpan</button>
            </div>
            </form>
        </div>
        </div>

    </div>
    </div>
</section>
<script>
    $("#nav-voucher").addClass("active");
    $("#nav-voucher-vouchertypeproducttype").addClass("active");
</script>
@endsection
