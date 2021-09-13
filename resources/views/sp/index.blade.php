@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Strategic Priority</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('strategic_priority/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Strategic Priority</h2>
    <p class="section-lead">Table of all Strategic Priority.</p>
    @csrf
    <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-body">
            &nbsp;
        <div class="table-responsive">
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Strategic direction</th>
                <th>Strategic priority</th>
                <th>Weight(%)</th>
                <th>Key Result</th>
                <th>Div</th>
                <th>Year</th>
                <th>Active</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($sp as $row)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$row->strategic_direction}}</td>
                <td><a href="#" onclick="modalData({{$row->id}})" data-toggle="modal" data-target="#exampleModal">detail</a></td>
                <td>
                    @php
                        $count = 100-$row->remain
                    @endphp
                    {{$count}}%
                </td>
                <td><a href="#" onclick="modalData({{$row->id}})" data-toggle="modal" data-target="#exampleModal">detail</a></td>
                <td>{{$row->div_name}}</td>
                <td>{{$row->year}}</td>
                <td>Y</td>
                {{-- <td><a href="{{ url('strategic_priority/edit/'.$row->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('strategic_priority/destroy/'.$row->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a> --}}
                </td>
            </tr>            
        @endforeach
        </tbody>
    </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="dataBody">
        Loading...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
      </div>
    </div>
  </div>
</div>
<script>
    $("#nav-strategic_priority").addClass("active");
    function modalData(id) {
        var csrfToken = $("input[name='_token']");

        var data = { _token : csrfToken.val(), id : id};
    
        $.post("{{ url('strategic_priority/finddetail') }}",data)
        .done(function(result)
        {
            $('#dataBody').html(result);
        })
        .fail(function(result)
        {
            alert("Sorry, Something goes wrong!!!");
            console.log(result);
        });
    }
</script>
@endsection