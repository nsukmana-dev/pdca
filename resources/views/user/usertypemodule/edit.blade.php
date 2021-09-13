@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>User type module update</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('user/usertypemodule') }}"><span class="badge badge-success">User type module Home</span></a>
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
            <form method="POST" action="{{ url('user/usertypemodule/update/'.$usertypemodule['id'].'') }}">
            @csrf
            <div class="card-header">
                <h4>Form Edit user type module</h4>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label>User type name</label>
                <select name="user_type_id" id="user_type_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($usertype as $row)
                <option value="{{ $row['id'] }}" {{ $usertypemodule->user_type_id == $row['id'] ? 'selected' : '' }}>{{ $row['user_type_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Module name</label>
                <select name="module_id" id="module_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($module as $row)
                <option value="{{ $row['id'] }}" {{ $usertypemodule->module_id == $row['id'] ? 'selected' : '' }}>{{ $row['module_name'] }}</option>
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
    $("#nav-user").addClass("active");
    $("#nav-user-usertypemodule").addClass("active");
</script>
@endsection