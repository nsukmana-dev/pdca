@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>User account create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('user/useraccount') }}"><span class="badge badge-success">User account Home</span></a>
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
    
    <form method="POST" action="{{ url('user/useraccount/update/'.$useraccount['id'].'') }}">
    <div class="row">
        @csrf
        <div class="col-6 col-md-6 col-lg-6">
        <div class="card">   
            <div class="card-header">
                <h4>Form Input user account</h4>
            </div>
            <div class="card-body">

                <div class="form-group">
                <label>Login</label>
                <input value="{{ $useraccount['login'] }}" type="text" class="form-control" disabled>
                </div>

                <div class="form-group">
                <label>Is internal</label>
                <select name="is_internal" id="is_internal" required class="form-control">
                <option value="">-Pilih-</option>
                <option value="1" {{ $useraccount['is_internal'] == '1' ? "selected" :""}}>Yes</option>
                <option value="0" {{ $useraccount['is_internal'] == '0' ? "selected" :""}}>No</option>
                </select>
                </div>

                <div class="form-group">
                <label>Person</label>
                <select name="person_id" id="person_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($person as $row)
                <option value="{{ $row['id'] }}" {{ $useraccount['person_id'] == $row['id'] ? "selected" :""}}>{{ $row['first_name'] }} {{ $row['middle_name'] }} {{ $row['last_name'] }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>Password</label>
                <input name="password" value="{{ $useraccount['salt'] }}" type="password" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Salt</label>
                <input name="salt" value="{{ $useraccount['salt'] }}" type="text" class="form-control">
                </div>

                <div class="form-group">
                <label>Password expiration</label>
                <input name="password_expiration" value="{{ old('password_expiration') }}" type="date" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Member number</label>
                <input name="member_number" value="{{ old('member_number') }}" type="text" class="form-control">
                </div>

                <div class="form-group">
                <label>Access code</label>
                <input name="access_code" value="{{ old('access_code') }}"  class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Activation code</label>
                <input name="activation_code" value="{{ old('activation_code') }}"  class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Activation expiration</label>
                <input name="activation_expiration" value="{{ old('activation_expiration') }}" type="date" class="form-control" required="">
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
                <label>Is activated</label>
                <select name="is_activated" id="is_activated" required class="form-control">
                <option value="">-Pilih-</option>
                <option value="1" {{ old('is_activated') == '1' ? "selected" :""}}>Yes</option>
                <option value="0" {{ old('is_activated') == '0' ? "selected" :""}}>No</option>
                </select>
                </div>

                <div class="form-group">
                <label>Activated at</label>
                <input name="activated_at" value="{{ old('activated_at') }}" type="date" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Persist code</label>
                <input name="persist_code" value="{{ old('persist_code') }}"  class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Session persistence expiration</label>
                <input name="session_persistence_expiration" value="{{ old('session_persistence_expiration') }}" type="date" class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Reset password code</label>
                <input name="reset_password_code" value="{{ old('reset_password_code') }}"  class="form-control" required="">
                </div>

                <div class="form-group">
                <label>Reset password expiration</label>
                <input name="reset_password_expiration" value="{{ old('reset_password_expiration') }}" type="date" class="form-control" required="">
                </div>
                
                <div class="form-group">
                <label>Is superuser</label>
                <select name="is_superuser" id="is_superuser" required class="form-control">
                <option value="">-Pilih-</option>
                <option value="1" {{ old('is_superuser') == '1' ? "selected" :""}}>Yes</option>
                <option value="0" {{ old('is_superuser') == '0' ? "selected" :""}}>No</option>
                </select>
                </div>

                <div class="form-group">
                <label>user type id</label>
                <select name="user_type_id" id="user_type_id" required class="form-control">
                <option value="">-Pilih-</option>
                @foreach ($usertypemodule as $row)
                <option value="{{ $row->id }}" {{ old('user_type_id') == $row->id ? "selected" :""}}>{{ $row->user_type_name }} - {{ $row->module_name }}</option>
                @endforeach
                </select>
                </div>

                <div class="form-group">
                <label>User profile file name</label>
                <input name="user_profile_file_name" value="{{ old('user_profile_file_name') }}"  class="form-control" required="">
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