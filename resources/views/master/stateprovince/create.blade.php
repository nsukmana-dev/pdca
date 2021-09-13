@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master state province Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/stateprovince') }}"><span class="badge badge-success">Master state province Home</span></a>
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
            <form method="POST" action="{{ url('master/stateprovince/store') }}">
            @csrf
            <div class="card-header">
                <h4>Form Input Master state province</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>State province Code</label>
                <input name="state_province_code" value="{{ old('state_province_code') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>State province Name</label>
                <input name="state_province_name" value="{{ old('state_province_name') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Country Name</label>
                <select name="country_id" id="country_id" required class="form-control">
                @foreach ($country as $row)
                <option value="{{ $row['id'] }}">{{ $row['country_name'] }}</option>
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
    $("#nav-master").addClass("active");
    $("#nav-master-stateprovince").addClass("active");
</script>
@endsection