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
            <form method="POST" action="{{ url('voucher/vouchertype/store') }}">
            @csrf
            <div class="card-header">
                <h4>Form Input product type</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>Voucher type name</label>
                <input name="voucher_type_name" value="{{ old('voucher_type_name') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Voucher status</label>
                <input name="voucher_status" value="{{ old('voucher_status') }}" type="number" class="form-control" required="">
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
                <label>Voucher file name</label>
                <input name="voucher_file_name" value="{{ old('voucher_file_name') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Terms and conditions</label>
                <textarea name="terms_and_conditions" id="terms_and_conditions" cols="30" rows="10" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 96px;">{{ old('terms_and_conditions') }}</textarea>
                </div>

                <div class="form-group">
                <label>Comment</label>
                <textarea name="comment" id="comment" cols="30" rows="10" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 96px;">{{ old('comment') }}</textarea>
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
    $("#nav-voucher").addClass("active");
    $("#nav-voucher-vouchertype").addClass("active");
</script>
@endsection