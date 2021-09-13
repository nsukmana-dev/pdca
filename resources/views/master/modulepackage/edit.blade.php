@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master module package update</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/country') }}"><span class="badge badge-success">Master module package Home</span></a>
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
            <form method="POST" action="{{ url('master/modulepackage/update/'.$modulepackage['id'].'') }}">
            @csrf
            <div class="card-header">
                <h4>Form Edit Master Module package</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>Module package Code</label>
                <input disabled value="{{ $modulepackage['module_package_code'] }}" type="text" class="form-control disable" required="">
                </div>
                <div class="form-group">
                <label>Module package Name</label>
                <input name="module_package_name" value="{{ $modulepackage['module_package_name'] }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Description</label>
                <textarea name="description" id="description" cols="30" rows="10" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 96px;">{{ $modulepackage['description'] }}</textarea>
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
    $("#nav-master-modulepackage").addClass("active");
</script>
@endsection