@extends('layouts.master')

@section('content')
<section class="section">
    <div class="section-header">
    <h1>Master departemen</h1>
    <div class="section-header-breadcrumb">
        <a href="{{ url('master/departemen/create') }}"><span class="badge badge-success">Add <i class="fas fa-plus"></i> </span></a>
    </div>
    </div>

    <div class="section-body">
    <h2 class="section-title">Master departemen</h2>
    <p class="section-lead">Table of all master departemen.</p>
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
                <th>Dep id</th>
                <th>Dep name</th>
                <th>Dep status</th>
                <th>Plant</th>
                <th>Dep head</th>
                <th>Dep kode</th>
                <th>Division</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
        @foreach ($departemen as $row)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{$row['dep_id']}}</td>
                <td>{{$row['dep_name']}}</td>
                @if ($row['dep_status'] == 1)
                    <td>Active</td>
                @else
                    <td>Non Active</td>
                @endif
                @php
                    $plantrest = 0;
                @endphp
                @foreach ($plant as $item)
                    @if ($item->plant_id == $row['plant_id'])
                        <td>{{$item->plant_name}}</td>
                    @php
                        $plantrest = 1;
                    @endphp
                    @endif
                @endforeach
                @if ($plantrest <> 1)
                    <td></td>
                @endif
                <td>{{$row['dep_head']}}</td>
                <td>{{$row['dep_kode']}}</td>
                <td>{{$row['div_name']}} </td>
                <td><a href="{{ url('master/departemen/edit/'.$row['id'].'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                    <a href="{{ url('master/departemen/destroy/'.$row['id'].'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
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
<script>
    // $("#nav-master").addClass("active");
    // $("#nav-master-departemen").addClass("active");
</script>
@endsection