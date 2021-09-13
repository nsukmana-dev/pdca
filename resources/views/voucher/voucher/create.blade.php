@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Voucher Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('product/product') }}"><span class="badge badge-success">Voucher Home</span></a>
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
            <form method="POST" action="{{ url('voucher/voucher/store') }}">
            @csrf
            <div class="card-header">
                <h4>Form Input voucher</h4>
            </div>
            <div class="card-body">

                <div class="form-group">
                <label>Voucher code</label>
                <input name="voucher_code" value="{{ old('voucher_code') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Voucher name</label>
                <input name="voucher_name" value="{{ old('voucher_name') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Voucher status</label>
                <input name="voucher_status" value="{{ old('voucher_status') }}" type="number" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Voucher Type</label>
                <select name="voucher_type_id" id="voucher_type_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($vouchertype as $row)
                <option value="{{ $row['id'] }}">{{ $row['voucher_type_name'] }}</option>
                @endforeach
                </select>
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
                <label>Effective date</label>
                <input name="effective_date" value="{{ old('effective_date') }}" type="date" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Expire date</label>
                <input name="expire_date" value="{{ old('expire_date') }}" type="date" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Is used</label>
                <select name="is_used" id="is_used" required class="form-control">
                <option value="">-Pilih-</option>
                <option value="1" {{ old('is_used') == '1' ? "selected" :""}}>Yes</option>
                <option value="0" {{ old('is_used') == '0' ? "selected" :""}}>No</option>
                </select>
                </div>

                <div class="form-group">
                <label>Used at</label>
                <input name="used_at" value="{{ old('used_at') }}" type="date" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Given by</label>
                <select name="given_by" id="given_by" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($person as $row)
                <option value="{{ $row['id'] }}">{{ $row['first_name'] }} {{ $row['middle_name'] }} {{ $row['last_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Given at</label>
                <input name="given_at" value="{{ old('given_at') }}" type="date" class="form-control" required="">
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
    $("#nav-voucher-voucher").addClass("active");
</script>
@endsection
