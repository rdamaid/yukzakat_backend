<header>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="#">
                <img src="{{ asset('img/sites/logo.png') }}" alt="logo" class="logo" />
            </a>
            <a class="navbar-brand pl-3" href="/">YUKZAKAT</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="/">
                        Beranda
                    </a>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Zakat
                            <i class="fa fa-chevron-left"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/kalkulasi-zakat">Kalkulasi Zakat</a>
                            <a class="dropdown-item" href="/bayar-zakat">Pembayaran Zakat</a>
                        </div>
                    </li>
                    <a class="nav-link {{ (request()->is('rekening')) ? 'active' : '' }}" href="/rekening">Rekening</a>
                    @if(Auth::guest())
                    <a class="nav-link" href="/login">Masuk</a>
                    <a class="btn btn-primary tombol-nav" href="/register">Daftar</a>
                    @else
                    <a class="nav-link {{ (request()->is('profil')) ? 'active' : '' }}" href="/profil">
                        <i class="fas fa-user pr-1"></i>
                        Ustad Bajigur
                    </a>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->
</header>
