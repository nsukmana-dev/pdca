@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>User person create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('user/person') }}"><span class="badge badge-success">User person Home</span></a>
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
    
    <form method="POST" action="{{ url('user/person/store') }}">
    <div class="row">
        @csrf
        <div class="col-6 col-md-6 col-lg-6">
        <div class="card">   
            <div class="card-header">
                <h4>Form Input user person</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>Name prefix</label>
                <select name="name_prefix_id" id="name_prefix_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($nameprefix as $row)
                <option value="{{ $row['id'] }}">{{ $row['name_prefix_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>First Name</label>
                <input name="first_name" value="{{ old('first_name') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Middle Name</label>
                <input name="middle_name" value="{{ old('middle_name') }}" type="text" class="form-control">
                </div>

                <div class="form-group">
                <label>Last Name</label>
                <input name="last_name" value="{{ old('last_name') }}" type="text" class="form-control">
                </div>

                <div class="form-group">
                <label>Birth date</label>
                <input name="birth_date" value="{{ old('birth_date') }}" type="date" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Gender</label>
                <input name="gender_name" id="gender_name" value="" type="text" class="form-control" required="" readonly>
                <input name="gender_id" id="gender_id" type="hidden" value="" readonly>
                </div>

                <div class="form-group">
                <label>Religion</label>
                <select name="religion_id" id="religion_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($religion as $row)
                <option value="{{ $row['id'] }}">{{ $row['religion_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Address</label>
                <textarea name="address_line" id="address_line" cols="30" rows="10" class="form-control" style="margin-top: 0px; margin-bottom: 0px; height: 96px;">{{ old('address_line') }}</textarea>
                </div>

                <div class="form-group">
                <label>Postal Code</label>
                <input name="postal_code" value="{{ old('postal_code') }}" type="text" class="form-control" required="">
                </div>
            </div>
        </div>
        </div>

        <div class="col-12 col-md-6 col-lg-6">
        <div class="card">   
            <div class="card-header">
                
            </div>
            <div class="card-body">
                <div class="form-group">
                <label>City</label>
                <select name="city_id" id="city_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($city as $row)
                <option value="{{ $row['id'] }}">{{ $row['city_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>State Province</label>
                <input name="state_province_name" id="state_province_name" value="" type="text" class="form-control" required="" readonly>
                <input name="state_province_id" id="state_province_id" type="hidden" value="" readonly>
                </div>

                <div class="form-group">
                <label>Country</label>
                <input name="country_name" id="country_name" value="" type="text" class="form-control" required="" readonly>
                <input name="country_id" id="country_id" type="hidden" value="" readonly>
                </div>

                <div class="form-group">
                <label>Email</label>
                <input name="email" value="{{ old('email') }}" type="email" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Mobile Number</label>
                <input name="mobile_number" value="{{ old('mobile_number') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Phone Number</label>
                <input name="phone_number" value="{{ old('phone_number') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>National Identity Number</label>
                <input name="national_identity_number" value="{{ old('national_identity_number') }}" type="text" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Company</label>
                <input name="company" value="{{ old('company') }}" type="text" class="form-control" required="">
                </div>
                
            </div>
            
            <div class="card-footer text-right">
                <button class="btn btn-primary">Simpan</button>
            </div>
        </div>
        </div>
        
    </div>
    
    </form>
    </div>
</section>
<script>
    $("#nav-user").addClass("active");
    $("#nav-user-person").addClass("active");
</script>
<script>
$('#name_prefix_id').on('change',function(){
    var name_prefix_id =  $('#name_prefix_id').val();
    var csrfToken = $("input[name='_token']");

    var data = { _token : csrfToken.val(), name_prefix_id : name_prefix_id};
 
    $.post("{{ url('/user/find/gender') }}",data)
    .done(function(result)
    {
        var res = result.split("*||*");
        $('#gender_name').val(res[0]);
        $('#gender_id').val(res[1]);
    })
    .fail(function(result)
    {
        alert("Sorry, Something goes wrong!!!");
        console.log(result);
    });

});

$('#city_id').on('change',function(){
    var city_id =  $('#city_id').val();
    var csrfToken = $("input[name='_token']");

    var data = { _token : csrfToken.val(), city_id : city_id};
 
    $.post("{{ url('/user/find/provcountry') }}",data)
    .done(function(result)
    {
        var res = result.split("*||*");
        $('#state_province_name').val(res[0]);
        $('#state_province_id').val(res[1]);

        $('#country_name').val(res[2]);
        $('#country_id').val(res[3]);
    })
    .fail(function(result)
    {
        alert("Sorry, Something goes wrong!!!");
        console.log(result);
    });

});
</script>
@endsection