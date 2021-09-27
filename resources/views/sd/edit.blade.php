@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Strategic direction update</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('strategic_direction') }}"><span class="badge badge-success">Strategic direction home</span></a>
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
            <form method="POST" action="{{ url('strategic_direction/update/'.$sd->id.'') }}">
            @csrf
            <div class="card-header">
                <h4>Form Edit Strategic direction</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label>Year</label>
                    @php
                        $year = date("Y");
                    @endphp
                    <select name="year" id="year" required class="form-control">
                    @for ($i = 1900; $i <= $year; $i++)
                        <option value="{{ $i }}" {{ $year == $sd['year'] ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                    </select>
                    </div>
                    <div class="form-group">
                    <label>Strategic direction</label>
                    <input name="strategic_direction" value="{{ $sd['strategic_direction'] }}" type="text" class="form-control" required="">
                    </div>
                    <div class="form-group">
                    <label>Weight</label>
                    <input name="weight" value="{{ $sd['weight'] }}" type="text" step="0.25"  class="form-control" required="">
                    </div>
                    <div class="form-group">
                    <label>Active</label>
                    <select name="active" id="active" required class="form-control">
                    <option value="Yes" {{ "Yes" == $sd['active'] ? 'selected' : '' }}>Yes</option>
                    <option value="No" {{ "NO" == $sd['active'] ? 'selected' : '' }}>No</option>
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
    $("#nav-strategic_direction").addClass("active");
</script>
<script>
 $('#state_province_id').on('change',function(){
    var state_province_id =  $('#state_province_id').val();
    var csrfToken = $("input[name='_token']");

    var data = { _token : csrfToken.val(), state_province_id : state_province_id};
 
    $.post("{{ url('/strategic_direction/findcountry') }}",data)
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