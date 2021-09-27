
<div class="card-header">
    <h4>Strategic plan</h4>
    <input type="hidden" value="1" id="norow">
</div>
<div class="card-body strategicplan" id="bodyRow">
    <div class="form-row ">
        @for ($i = 1; $i <= $jml; $i++)
        <div class="form-group col-4">
            <label>Periode</label>
            <input name="periode[]" value="{{ $year }}-{{ date('m', mktime(0, 0, 0, $i, 10)) }}" id="periode" type="month" class="form-control form-control-sm" readonly required="">
            <input type="hidden" name="strategic_plan_id[]" id="strategic_plan_id" value="{{ $ad_id }}-{{$i}}">
        </div>
        <div class="form-group col-4">
            <label>Target</label>
            <input name="target[]" value="jadi superman {{$i}}" onchange="targetsp({{$i}})" id="target{{$i}}" type="text" class="form-control form-control-sm" required="">
        </div>
        <div class="form-group col-2">
            <label>Weight(%)</label>
            <input name="weight[]" value="10" step="0.25" onchange="weightsp({{$i}})" id="weight{{$i}}" type="number" class="form-control form-control-sm" required="">
        </div>
        <div class="form-group col-2">&nbsp;</div>
        @endfor
    </div>
</div>
{{-- <div class="card-footer text-right">
    <button type="button" class="btn btn-success" onclick="addRow()">Add</button>
</div> --}}
{{-- <script>
    function target(id) {
        var target = $("#target"+id).val()
        $("#real_target"+id).val()
    }
</script> --}}