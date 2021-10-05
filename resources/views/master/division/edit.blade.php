@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Update Master Division</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/division') }}"><span class="badge badge-success">Home Master Division</span></a>
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
            <form method="POST" action="{{ url('master/division/update/'.$division['id'].'') }}">
            @csrf
            <div class="card-header">
                <h4>Form Edit Master division</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>Div id</label>
                <input name="div_id" value="{{ $division['div_id'] }}" type="number" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Div name</label>
                <input name="div_name" value="{{ $division['div_name'] }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Div status</label>
                <select name="div_status" id="div_status" class="form-control">
                    <option value="1" {{ 1 == $division['div_status'] ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ 0 == $division['div_status'] ? 'selected' : '' }}>Non Active</option>
                </select>
                </div>
                <div class="form-group">
                <label>Div kode</label>
                <input name="div_kode" value="{{ $division['div_kode'] }}" type="text" class="form-control" required="">
                </div>
            </div>
            <div class="card-footer text-right">
                <button class="btn btn-primary">Save</button>
            </div>
            </form>
        </div>
        </div>
        
    </div>
    </div>
</section>
<script>
    // $("#nav-master").addClass("active");
    // $("#nav-master-division").addClass("active");
</script>
@endsection