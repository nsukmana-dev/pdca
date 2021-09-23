<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>PDCA KPI Portal</title>
  <link rel="shortcut icon" href="{{ asset('img/logo/favicon.png') }}" type="image/x-icon">

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
  {{-- <script src="{{ asset('assets/js/stisla.js') }}"></script> --}}

  <!-- JS Libraies -->
  <script src="{{ asset('node_modules/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
  <script src="{{ asset('node_modules/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('node_modules/owl.carousel/dist/owl.carousel.min.js') }}"></script>
  <script src="{{ asset('node_modules/summernote/dist/summernote-bs4.js') }}"></script>
  <script src="{{ asset('node_modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>
  <script src="{{ asset('node_modules/datatables/media/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ asset('node_modules/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('node_modules/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
  <script src="{{ asset('node_modules/sweetalert/dist/sweetalert.min.js') }}"></script>
  <script src="{{ asset('assets/js/page/modules-sweetalert.js') }}"></script>
  <script src="{{ asset('node_modules/prismjs/prism.js') }}"></script>
  <script src="{{ asset('assets/js/page/bootstrap-modal.js') }}"></script>

  <!-- Template JS File -->
  {{-- <script src="{{ asset('assets/js/scripts.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/js/custom.js') }}"></script> --}}

  <!-- Page Specific JS File -->
  {{-- <script src="{{ asset('assets/js/page/index.js') }}"></script> --}}
  {{-- <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>   --}}
  <style>
    body {
      /* -moz-transform: scale(0.8, 0.8); */
      /* zoom: 0.8; */
      /* zoom: 80%; */
    }
  </style>
</head>

<body> 
  <div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      @include('layouts.navbar')
      @include('layouts.sidebar')

      <!-- Main Content -->
      <div class="main-content">
      @yield('content')
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2021 - PT GS Battery <div class="bullet"></div> Design By <a href="https://nsukmana-dev.github.io/" target="_blank">Nandar Sukmana</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
  </div>

  <script type="text/javascript">
    var a = "{{Session::get('message')}}";
    if (a == '') {

    }else {
      swal('Good Job', a, 'success');
    }
  </script>
  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
    $("#table-2").dataTable({
      "columnDefs": [
        { "sortable": false, "targets": [0,2,3] }
      ]
    });
    $('.delete-confirm').on('click', function (event) {
        event.preventDefault();
        const url = $(this).attr('href');
        swal({
            title: 'Are you sure?',
            text: 'This record and it`s details will be permanantly deleted!',
            icon: 'warning',
            buttons: ["Cancel", "Yes!"],
        }).then(function(value) {
            if (value) {
                window.location.href = url;
            }
        });
    });

  </script>
</body>
</html>
