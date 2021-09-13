@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Product Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('product/product') }}"><span class="badge badge-success">Product Home</span></a>
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
            <form method="POST" action="{{ url('product/product/store') }}">
            @csrf
            <div class="card-header">
                <h4>Form Input product</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>Product name</label>
                <input name="product_name" value="{{ old('product_name') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Product status</label>
                <input name="product_status" value="{{ old('product_status') }}" type="number" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Currency</label>
                <select name="currency_id" id="currency_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($currency as $row)
                <option value="{{ $row['id'] }}">{{ $row['currency_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Value</label>
                <input name="value" value="{{ old('value') }}" type="number" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Price</label>
                <input name="price" value="{{ old('price') }}" type="number" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Purchase age</label>
                <input name="purchase_age" value="{{ old('purchase_age') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Is featured</label>
                <select name="is_featured" id="is_featured" required class="form-control">
                <option value="">-Pilih-</option>
                <option value="1" {{ old('is_featured') == '1' ? "selected" :""}}>Yes</option>
                <option value="0" {{ old('is_featured') == '0' ? "selected" :""}}>No</option>
                </select>
                </div>

                <div class="form-group">
                <label>Product file name</label>
                <input name="product_file_name" value="{{ old('product_file_name') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Terms and conditions</label>
                <input name="terms_and_conditions" value="{{ old('terms_and_conditions') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Short description</label>
                <textarea name="short_description" id="short_description" cols="30" rows="10" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 96px;">{{ old('short_description') }}</textarea>
                </div>
                <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 96px;">{{ old('description') }}</textarea>
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
    $("#nav-product").addClass("active");
    $("#nav-product-product").addClass("active");
</script>
@endsection
