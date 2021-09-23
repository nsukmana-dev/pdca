@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Activity Division Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('activity_division') }}"><span class="badge badge-success">Activity Division Home</span></a>
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
    <div class="container">
    <form method="POST" action="{{ url('activity_division/store') }}">
    <div class="row d-flex justify-content-center">
        <div class="col-12 col-md-9 col-lg-9">
            <div class="card">
                @csrf
                <div class="card-header">
                    <h4>Form activity division</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label>Year</label>
                        <input name="year" value="" id="year" readonly type="number" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Division</label>
                        <input name="remain" value="Marketing" id="remain" readonly type="text" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Strategic direction</label>
                        <input name="remain" value="Increase Profitability" id="remain" readonly type="text" class="form-control form-control-sm" required="">
                    </div>
                    
                    <div class="form-group">
                        <label>Strategic priority</label>
                        <input name="remain" value="Increase Import Customer" id="remain" readonly type="text" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Key result</label>
                        <input name="remain" value="Increase min.10% import customer" id="remain" readonly type="text" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Activity - Division</label>
                        <textarea name="" class="form-control form-control-sm" id="" cols="30" rows="10">new prospect customer</textarea>
                    </div>

                    <div class="form-group">
                        <label>Target - Division</label>
                        <textarea name="" class="form-control form-control-sm" id="" cols="30" rows="10">new import customer min. 15 cust in 2021</textarea>
                    </div>

                    <div class="form-group">
                        <label>Budget Rp.</label>
                        <input name="remain" value="0" id="remain" type="number" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Related division</label>
                        <input name="remain" value="0" id="remain" type="number" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Due date activity</label>
                        <input name="remain" value="0" id="remain" type="date" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Achievment (2020)</label>
                        <input name="remain" value="new import customer 10 company" readonly id="remain" type="text" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>%Achievment</label>
                        <input name="remain" value="26%" id="remain" readonly type="text" class="form-control form-control-sm" required="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Strategic plan</h4>
                    <input type="hidden" value="1" id="norow">
                </div>
                <div class="card-body" id="bodyRow">
                    <div class="form-row">
                        <div class="form-group col-5">
                            <label>Periode</label>
                            <input name="periode" value="{{ old('periode') }}" id="periode" type="month" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-5">
                            <label>Target</label>
                            <input name="remain" value="new import cust.5 companies" id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-2">
                            <label>Weight(%)</label>
                            <input name="remain" value="10" id="remain" type="number" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-5">
                            <input name="periode" value="{{ old('periode') }}" id="periode" type="month" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-5">
                            <input name="remain" value="new import cust.5 companies" id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-2">
                            <input name="remain" value="10" id="remain" type="number" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-5">
                            <input name="periode" value="{{ old('periode') }}" id="periode" type="month" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-5">
                            <input name="remain" value="new import cust.5 companies" id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-2">
                            <input name="remain" value="10" id="remain" type="number" class="form-control form-control-sm" required="">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-success" onclick="addRow()">Add</button>
                    {{-- <button type="submit" class="btn btn-primary">Save</button> --}}
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9 col-lg-9">
            <div class="card">
                <div class="card-header">
                    <h4>Realization</h4>
                    <input type="hidden" value="1" id="norow">
                </div>
                <div class="card-body" id="bodyRow">
                    <h5 class="text-info">January</h5>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label>Strategic Plan(%)</label>
                            <input name="periode" value="10" id="periode" readonly type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-4">
                            <label>Target</label>
                            <input name="remain" value="new import cust.5 companies" readonly id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-8">
                            <label>Actual Realization(%)</label>
                            <input name="periode" value="10" id="periode" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-4">
                            <label>Target</label>
                            <input name="remain" value="new import cust.5 companies" id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-8">
                            <label>To Target(%)</label>
                            <input name="periode" value="100" id="periode" readonly type="text" class="form-control form-control-sm" required="">
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-info">February</h5>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label>Strategic Plan(%)</label>
                            <input name="periode" value="10" id="periode" readonly type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-4">
                            <label>Target</label>
                            <input name="remain" value="new import cust.5 companies" readonly id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-8">
                            <label>Actual Realization(%)</label>
                            <input name="periode" value="10" id="periode" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-4">
                            <label>Target</label>
                            <input name="remain" value="new import cust.5 companies" id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-8">
                            <label>To Target(%)</label>
                            <input name="periode" value="100" id="periode" readonly type="text" class="form-control form-control-sm" required="">
                        </div>
                    </div>
                    <hr>
                    <h5 class="text-info">March</h5>
                    <div class="form-row">
                        <div class="form-group col-8">
                            <label>Strategic Plan(%)</label>
                            <input name="periode" value="10" id="periode" readonly type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-4">
                            <label>Target</label>
                            <input name="remain" value="new import cust.5 companies" readonly id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-8">
                            <label>Actual Realization(%)</label>
                            <input name="periode" value="10" id="periode" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-4">
                            <label>Target</label>
                            <input name="remain" value="new import cust.5 companies" id="remain" type="text" class="form-control form-control-sm" required="">
                        </div>
                        <div class="form-group col-8">
                            <label>To Target(%)</label>
                            <input name="periode" value="100" id="periode" readonly type="text" class="form-control form-control-sm" required="">
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    {{-- <button type="button" class="btn btn-success" onclick="addRow()">Add</button> --}}
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>

    </div>
    </form>
    </div>
</section>
<script>
    $("#nav-activity_division").addClass("active");
    var element = document.body;
    element.classList.add("sidebar-mini");
</script>
@endsection