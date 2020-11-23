<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>{{$title ?? ''}}</title>
    <link rel="shortcut icon" href="{{ asset('img/sites/logo-ipb.png') }}" />
    <link href="{{ asset('css/admin/styles.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/admin/custom.css') }}" />
    <!-- FONT LATO -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
        crossorigin="anonymous" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous">
    </script>
</head>

<body class="sb-nav-fixed">
    
    <!-- Navbar-->
    @include('admin.layouts.includes._navbar')
    <div id="layoutSidenav">
        <!-- SIDEBAR -->
        @include('admin.layouts.includes._sidebar')
        <div id="layoutSidenav_content">
            <!-- BREADCRUMB -->
            @include('admin.layouts.includes._breadcrumb')

            <!-- CONTENT -->
            @yield('content')

            <!-- FOOTER -->
            @include('admin.layouts.includes._footer')
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/admin/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/admin/chart-area-demo.js')}}"></script>
    <script src="{{ asset('js/admin/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/admin/datatables-demo.js')}}"></script>
</body>

</html>
