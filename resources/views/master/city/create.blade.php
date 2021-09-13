@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master City Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/city') }}"><span class="badge badge-success">Master City Home</span></a>
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
            <form method="POST" action="{{ url('master/city/store') }}">
            @csrf
            <div class="card-header">
                <h4>Form Input Master City</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>City Code</label>
                <input name="city_code" value="{{ old('city_code') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>City Name</label>
                <input name="city_name" value="{{ old('city_name') }}" type="text" class="form-control" required="">
                </div>
                <div class="form-group">
                <label>State Province Id</label>
                <select name="state_province_id" id="state_province_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($stateprovince as $row)
                <option value="{{ $row['id'] }}">{{ $row['state_province_name'] }}</option>
                @endforeach
                </select>
                </div>
                <div class="form-group">
                <label>Country ID</label>
                <input name="country_name" id="country_name" value="" type="text" class="form-control" required="" readonly>
                <input name="country_id" id="country_id" type="hidden" value="" readonly>
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
    $("#nav-master-city").addClass("active");
</script>
<script>
 $('#state_province_id').on('change',function(){
    var state_province_id =  $('#state_province_id').val();
    var csrfToken = $("input[name='_token']");

    var data = { _token : csrfToken.val(), state_province_id : state_province_id};
 
    $.post("{{ url('/master/city/findcountry') }}",data)
    .done(function(result)
    {
        var res = result.split("*||*");
        $('#country_name').val(res[0]);
        $('#country_id').val(res[1]);
    })
    .fail(function(result)
    {
        alert("Sorry, Something goes wrong!!!");
        console.log(result);
    });

});
</script>
@endsection