<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/sites/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />

    <!-- FONT LATO -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/sites/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('img/sites/logo-ipb.png') }}" />
    <title>Beranda</title>
</head>

<body>
    <!-- HEADER -->
    @include('sites.layouts.includes._header')
    <!-- END OF HEADER -->

    <!-- Jumbotron Card -->
    @include('sites.layouts.includes._jumbotron')
    <!-- End of Jumbotron Card -->

    @yield('content')

    <!-- FOOTER -->
    @include('sites.layouts.includes._footer')
    <!-- END OF FOOTER -->

    <!-- <script src="/assets/sites/js/script.js"></script> -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/sites/bootstrap.min.js') }}"></script>
</body>

</html>
