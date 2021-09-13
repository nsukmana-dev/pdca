@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master departemen Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/departemen') }}"><span class="badge badge-success">Master departemen Home</span></a>
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
            <form method="POST" action="{{ url('master/departemen/store') }}">
            @csrf
            <div class="card-header">
                <h4>Form Input Master departemen</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>Departemen id</label>
                <input name="dep_id" value="{{ old('dep_id') }}" type="number" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Departemen Name</label>
                <input name="dep_name" value="{{ old('dep_name') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Departemen Status</label>
                <select name="dep_status" id="dep_status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Non Active</option>
                </select>
                </div>
                <div class="form-group">
                <label>Plant</label>
                <select name="plant_id" id="plant_id" class="form-control">
                    <option value="">--Pilih--</option>
                    @foreach ($plant as $item)
                    <option value="{{$item->plant_id}}" {{ $item->plant_id == old('plant_id') ? 'selected' : '' }}>{{$item->plant_name}}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group">
                <label>Departemen head</label>
                <input name="dep_head" value="{{ old('dep_head') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Departemen kode</label>
                <input name="dep_kode" value="{{ old('dep_kode') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Division</label>
                <select name="div_id" id="div_id" class="form-control" required="">
                    <option value="">--Pilih---</option>
                    @foreach ($div as $item)
                    <option value="{{$item->div_id}}" {{ $item->div_id == old('div_id') ? 'selected' : '' }}>{{$item->div_name}}</option>
                    @endforeach
                </select>
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
    // $("#nav-master-departemen").addClass("active");
</script>
@endsection