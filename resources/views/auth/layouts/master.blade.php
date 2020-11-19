<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <!-- FONT LATO -->
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/sites/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('img/sites/logo-ipb.png') }}" />
    <title>Login</title>
</head>

<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="#">
                <img src="{{ asset('img/sites/logo.png') }}" alt="logo" class="logo" />
            </a>
            <a class="navbar-brand pl-3" href="#">YUKZAKAT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link" href="/template/pages/sites/index.html">Beranda</a>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Zakat
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/template/pages/sites/kalkulasi-zakat.html">Kalkulasi
                                Zakat</a>
                            <a class="dropdown-item" href="/template/pages/sites/bayar-zakat.html">Pembayaran Zakat</a>
                        </div>
                    </li>
                    <a class="nav-link" href="/template/pages/sites/rekening.html">Rekening</a>
                    <a class="nav-link active" href="/template/pages/sites/login.html">Masuk</a>
                    <a class="btn btn-primary tombol-nav" href="/template/pages/sites/register.html">
                        Daftar
                    </a>
                </div>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- INI KONTENT -->
    @yield('content')
    <!-- END OF KONTENT -->

    <!-- FOOTER -->
    <footer>
        <!-- Copyright -->
        <div class="footer-copyright text-center py-3">
            <span> © YukZakat 2020 </span>
            <span> <a href="#">Tentang Kami</a> </span>
        </div>

        <!-- Copyright -->
    </footer>
    <!-- END OF FOOTER -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>
</body>

</html>
