@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master status update</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/status') }}"><span class="badge badge-success">Master status Home</span></a>
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
            <form method="POST" action="{{ url('master/status/update/'.$status['id'].'') }}">
            @csrf
            <div class="card-header">
                <h4>Form Edit Master status</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>Status Code</label>
                <input disabled value="{{ $status['status_code'] }}" type="text" class="form-control disable" required="">
                </div>
                <div class="form-group">
                <label>Status Name</label>
                <input name="status_name" value="{{ $status['status_name'] }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Internal status name</label>
                <input name="internal_status_name" value="{{ $status['internal_status_name'] }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>Consumer status name</label>
                <input name="consumer_status_name" value="{{ $status['consumer_status_name'] }}" type="text" class="form-control" required="">
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
    $("#nav-master-status").addClass("active");
</script>
@endsection