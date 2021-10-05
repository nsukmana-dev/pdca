@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Create AP Division</h1>
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
                        <input name="year" value="{{$sd->year}}" id="year" readonly type="number" class="form-control form-control-sm" required="">
                        <input type="hidden" name="ad_id" id="ad_id" value="{{ $ad_id }}">
                    </div>

                    <div class="form-group">
                        <label>Division</label>
                        <input name="div_name" value="{{$sd->div_name}}" id="div_name" readonly type="text" class="form-control form-control-sm" required="">
                        <input name="div_id" value="{{$sd->div_id}}" id="div_id" readonly type="hidden" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Strategic direction</label>
                        <input name="strategic_direction" value="{{$sd->strategic_direction}}" id="strategic_direction" readonly type="text" class="form-control form-control-sm" required="">
                        <input name="sd_id" value="{{$sd->id}}" id="sd_id" readonly type="hidden" class="form-control form-control-sm" required="">
                    </div>
                    
                    <div class="form-group">
                        <label>Strategic priority</label>
                        <input name="strategic_priority" value="{{$sp->strategic_priority}}" id="strategic_priority" readonly type="text" class="form-control form-control-sm" required="">
                        <input name="sp_id" value="{{$sp->id}}" id="sp_id" readonly type="hidden" class="form-control form-control-sm" required="">
                        <input name="spd_id" value="{{$sp->spd_id}}" id="spd_id" readonly type="hidden" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Key result</label>
                        <input name="key_result" value="{{$sp->key_result}}" id="key_result" readonly type="text" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Activity - Division</label>
                        <textarea name="activity_division" class="form-control form-control-sm" id="activity_division" cols="30" rows="10" required>{{ old('activity_division')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Target - Division</label>
                        <textarea name="target_division" class="form-control form-control-sm" id="target_division" cols="30" rows="10" required>{{ old('target_division')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Activity Weight</label>
                        <input name="activity_weight" value="0" id="activity_weight" type="number" step="0.25" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Budget Rp.</label>
                        <input name="budget" value="0" id="budget" type="number" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Related division</label><br>
                        <select name="related_division[]" class="form-control form-control-sm select2" multiple="">
                            @foreach ($div as $item)
                                <option value="{{ $item->div_name }}">{{ $item->div_name }}</option>
                            @endforeach
                            {{-- <option selected>Option 1</option>
                            <option>Option 2</option>
                            <option selected>Option 3</option>
                            <option>Option 4</option>
                            <option>Option 5</option>
                            <option>Option 6</option> --}}
                        </select>                      
                    </div>
                    
                    <div class="form-group">
                        <label>Due date activity</label>
                        <input name="due_date_activity" value="" onchange="duedate()" id="due_date_activity" type="date" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>Achievment ({{$sd->year-1}})</label>
                        <input name="achievement_last_year" value="achievement_last_year" readonly id="remain" type="text" class="form-control form-control-sm" required="">
                    </div>

                    <div class="form-group">
                        <label>% Achievment</label>
                        <input name="achievement_last_year_weight" value="26" id="achievement_last_year_weight" readonly type="text" class="form-control form-control-sm" required="">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-9 col-lg-9">
            <div class="card" id="spcard">
                
            </div>
        </div>

        <div class="col-12 col-md-9 col-lg-9">
            <div class="card" id="realizationcard">
                
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
    function duedate() {
        var csrfToken = $("input[name='_token']");
        var month = $("#due_date_activity").val();
        var year = $("#year").val();
        var ad_id = {{$ad_id}}
        var data = { _token : csrfToken.val(), month : month, year : year, ad_id : ad_id};

        $.post("{{ url('activity_division/finddetailsp') }}", data)
        .done(function(result)
        {
            $('#spcard').html(result);
        })
        .fail(function(result)
        {
            swal("Call Admin", "Something goes wrong on strategic plan", "error");
            // alert("Sorry, Something goes wrong on strategic plan!!!");
            console.log(result);
        });

        $.post("{{ url('activity_division/finddetailrealization') }}", data)
        .done(function(result)
        {
            $('#realizationcard').html(result);
        })
        .fail(function(result)
        {
            swal("Call Admin", "Something goes wrong on realization", "error");
            // alert("Sorry, Something goes wrong on strategic plan!!!");
            console.log(result);
        });

    }

    function weightsp(id) {
        var weightsp = 0;
        $('.weightsp').each(function() {
            // if ($('.weightsp').val() == 0) {
                
            // }else{
                weightsp += parseInt($(this).val());
            // }
        });
        var activity_weight = parseInt($("#activity_weight").val());
        if (weightsp > activity_weight) {
            alert('Weight strategic plan should not be greater than activity weight');
            $("#weight"+id).val("0");
            $("#weight"+id).focus();
        }else{
            var weight = $("#weight"+id).val();
            $("#real_periode"+id).val(weight);
        }
    }

    function targetsp(id) {
        var target = $("#target"+id).val()
        $("#real_target"+id).val(target);
        // alert(target);
    }

    function actualreal(id) {
        var weight = parseInt($("#weight"+id).val());
        var actual = parseInt($("#actual"+id).val());
        var to_taget = (((weight/100) * (actual/100))*100)*100;
        // var to_targetPer = to_taget * 100;
        // alert(to_taget);
        $("#to_target"+id).val(Math.floor(to_taget));
    }
</script>
@endsection