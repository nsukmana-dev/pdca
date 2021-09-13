@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Strategic Priority Create</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('strategic_priority') }}"><span class="badge badge-success">Strategic Priority Home</span></a>
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
    
    <form method="POST" action="{{ url('strategic_priority/store') }}">
    <div class="row">
        <div class="col-12 col-md-4 col-lg-4">
            <div class="card">
                @csrf
                <div class="card-header">
                    <h4>Form strategic priority</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                    <label>Year</label>
                    @php
                        $year = date("Y");
                        echo $year;
                    @endphp
                    <select name="year" id="year" required class="form-control">
                    @for ($i = 1900; $i <= $year; $i++)
                        <option value="{{ $i }}" {{ $year == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                    </select>
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
                    <div class="form-group">
                        <label>Strategic direction</label>
                        <select name="sd_id" id="sd_id" class="form-control" required="">
                            <option value="">--Pilih---</option>
                            @foreach ($sd as $item)
                            <option value="{{$item->id}}" {{ $item->id == old('sd_id') ? 'selected' : '' }}>{{$item->strategic_direction}}</option>
                            @endforeach
                        </select>
                        </div>
                    <div class="form-group">
                    <label>Remain</label>
                    <input name="remain" value="{{ old('remain') }}" id="remain" type="number" readonly class="form-control" required="">
                    <input name="remain2" value="" id="remain2" type="hidden" readonly class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8 col-lg-8">
            <div class="card">
                @csrf
                <div class="card-header">
                    <h4>Strategic priority</h4>
                    <input type="hidden" value="1" id="norow">
                </div>
                <div class="card-body" id="bodyRow">
                    <div class="form-row">
                        <div class="col-4">
                          <label class="sr-only" for="inlineFormInput">Strategic priority</label>
                          <input name="strategic_priority[]" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Strategic priority" required>
                        </div>
                        <div class="col-3">
                          <label class="sr-only" for="inlineFormInput">Key Result</label>
                          <input name="key_result[]" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Input Key Result">
                        </div>
                        <div class="col-2">
                          <label class="sr-only" for="inlineFormInput">Weight</label>
                          <input name="weight[]" type="number" id="weight1" onchange="weightCount(1)" min="0" class="form-control mb-2" id="inlineFormInput" placeholder="Weight" required>
                        </div>
                        <div class="col-1">
                            <div class="form-check">
                            <input type="hidden" name="active[]" id="active1" value="Y">
                            <input class="form-check-input" id="chaked1" type="checkbox" value="Y" onchange="active(1)" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                                Active
                            </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <button type="button" class="btn btn-success" onclick="addRow()">Add</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</section>
<script>
    $("#nav-strategic_priority").addClass("active");

    function addRow() {
        $norow = parseInt($("#norow").val());
        $norow += 1;
        $html = '<div class="form-row" id="del'+$norow+'">';
        $html += '<div class="col-4">';
        $html += '<label class="sr-only" for="inlineFormInput">Strategic priority</label>';
        $html += '<input name="strategic_priority[]" type="text" class="form-control mb-2" id="inlineFormInput" placeholder="Strategic priority" required>';
        $html += '</div>';
        $html += '<div class="col-3">';
        $html += '<label class="sr-only" for="inlineFormInput">Key Result</label>';
        $html += '<input name="key_result[]" type="text" class="form-control mb-2" id="inlineFormInput" min="0" placeholder="Input Key Result">';
        $html += '</div>';
        $html += '<div class="col-2">';
        $html += '<label class="sr-only" for="inlineFormInput">Weight</label>';
        $html += '<input value="0" name="weight[]" id="weight'+$norow+'" onchange="weightCount('+$norow+')" type="number" class="form-control mb-2" id="inlineFormInput" placeholder="Weight" required>';
        $html += '</div>';        
        $html += '<div class="col-1">';
        $html += '<div class="form-check">';
        $html += '<input type="hidden" name="active[]" id="active'+$norow+'" value="Y">';
        $html += '<input class="form-check-input" id="chaked'+$norow+'" type="checkbox" value="Y" onchange="active('+$norow+')" checked>';
        $html += '<label class="form-check-label" for="flexCheckChecked">';
        $html += 'Active';
        $html += '</label>';
        $html += '</div>';
        $html += '</div>';
        $html += '<div class="col-1" align="right">';
        $html += '<button type="button" onclick="deleteRow('+$norow+')" class="btn btn-danger mb-2"><i class="fa fa-trash"></></button>';
        $html += '</div>';
        $html += '</div>';
        $("#bodyRow").append($html);
        $("#norow").val($norow);
    }

    function deleteRow($no) {
        $remain2 = $("#remain2").val();
        $weight = $("#weight"+$no).val();
        $norow = parseInt($("#norow").val());
        $norow -= 1;
        if ($weight != '') {
            $remain2 = parseInt($remain2) - parseInt($weight);
            $remain = 100 - $remain2;
        }
        $("#remain").val($remain);
        $("#remain2").val($remain2);
        $("#norow").val($norow);
        $("#del"+$no).remove();
    }

    function weightCount($no) {
        $remain2 = $("#remain2").val();
        $norow = parseInt($("#norow").val());
        // alert($remain);
        if ($remain2 == '') {
            $remain2 = 0;
        }
        if ($norow == 1) {
            $remain2 = 0 + parseInt($("#weight"+$no).val())
            $remain = 100 - $remain2;
        }else{
            $remain2 = parseInt($remain2) + parseInt($("#weight"+$no).val())
            $remain = 100 - $remain2;
        }
        
        $("#remain").val($remain);
        $("#remain2").val($remain2);
        // alert(remain);
    }

    function active($no) {
        if ($('#chaked'+$no).is(':checked')) {
            $("#active"+$no).val("Y");
            alert("Y");
        }else{
            $("#active"+$no).val("N");
            alert("N");
        }
    }
</script>
@endsection