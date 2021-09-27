<div class="card-header">
    <h4>Realization</h4>
    <input type="hidden" value="1" id="norow">
</div>
<div class="card-body" id="bodyRow">
    @for ($i = 1; $i <= $jml; $i++)
    <h5 class="text-info">{{ date('F', mktime(0, 0, 0, $i, 10)) }}</h5>
    <div class="form-row">
        <div class="form-group col-4">
            <label>Strategic Plan(%)</label>
            <input name="real_periode[]" value="10" id="real_periode{{$i}}" readonly type="number" step="0.25" class="form-control form-control-sm" required="">
            <input type="hidden" name="real_strategic_plan_id[]" id="real_strategic_plan_id" value="{{ $ad_id }}-{{$i}}">
        </div>
        <div class="form-group col-8">
            <label>Target</label>
            <input name="real_target[]" value="jadi superman {{$i}}" readonly id="real_target{{$i}}" type="text" class="form-control form-control-sm" required="">
        </div>
        <div class="form-group col-4">
            <label>Actual Realization(%)</label>
            <input name="actual[]" value="10" id="actual" type="number" step="0.25" class="form-control form-control-sm" required="">
        </div>
        <div class="form-group col-8">
            <label>Realization</label>
            <input name="realization[]" value="jadi spiderman {{$i}}" id="realization" type="text" class="form-control form-control-sm" required="">
        </div>
        <div class="form-group col-4">
            <label>To Target(%)</label>
            <input name="to_target[]" value="100" onchange="to_target({{$i}})" id="to_target" readonly type="number" step="0.25" class="form-control form-control-sm" required="">
        </div>
        <div class="form-group" id="to_target{{$i}}">
            <input type="hidden" name="issue[]" value="">
            <input type="hidden" name="action_plan[]" value="">
            <input type="hidden" name="due_date_action_plan[]" value="">
            <input type="hidden" name="PIC[]" value="">
            <input type="hidden" name="pica_attachment[]" value="">
            <input type="hidden" name="pica_status[]" value="">
        </div>
    </div>
    <hr>
    @endfor
    </div>
</div>
<div class="card-footer text-right">
    {{-- <button type="button" class="btn btn-success" onclick="addRow()">Add</button> --}}
    <button type="submit" class="btn btn-primary">Save</button>
</div>