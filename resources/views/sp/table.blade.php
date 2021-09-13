<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PDCA</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('node_modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/summernote/dist/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/owl.carousel/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/owl.carousel/dist/assets/owl.theme.default.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/prismjs/themes/prism.css') }}">

  <link rel="stylesheet" href="{{ asset('assets/datatables/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('node_modules/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

  <!-- JS Libraies -->
  <script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
 
</head>
<body>
    
<table id="example2" class="display" style="width:100%">
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
        <tr class="text-primary">
            <td>1</td>
            <td>{{$spt->strategic_direction}}</td>
            <td></td>
            <td>
                @php
                    $count = 100-$spt->remain
                @endphp
                {{$count}}%
            </td>
            <td></td>
            <td>{{$spt->div_name}}</td>
            <td>{{$spt->year}}</td>
            <td></td>
            <td></td>
        </tr>
        @php
            $no = 2;
        @endphp
        @foreach ($spdetail as $item)
        <tr>
            <td>{{$no++}}</td>
            <td></td>
            <td>{{$item->strategic_priority}}</td>
            <td>{{$item->weight}}%</td>
            <td>{{$item->key_result}}</td>
            <td>{{$spt->div_name}}</td>
            <td>{{$spt->year}}</td>
            <td>{{$item->active}}</td>
            <td><a href="{{ url('strategic_priority/edit/'.$item->id.'') }}" class="btn btn-primary btn-sm">Edit</a> &nbsp; 
                <a href="{{ url('strategic_priority/destroy/'.$item->id.'') }}" class="btn btn-danger delete-confirm btn-sm">Delete</a>
            </td>
        </tr>
        @endforeach   
    </tbody>
</table>
  <script>
    $(document).ready(function() {
      $('#example2').DataTable();
    });
  </script>
</body>

</html>