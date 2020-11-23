<header>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a href="{{ route('home') }}">
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
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ (request()->is('kalkulasi-zakat')) ? 'active' : '' }} {{ (request()->is('bayar-zakat')) ? 'active' : '' }}"
                                href="{{route('kalkulasi-zakat')}}">
                                Zakat
                                <i class="fa fa-chevron-left"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('kalkulasi-zakat')}}">Kalkulasi Zakat</a>
                                <a class="dropdown-item" href="{{route('bayar-zakat')}}">Pembayaran Zakat</a>
                            </div>
                        </li>
                    </ul>
                    <a class="nav-link {{ (request()->is('rekening')) ? 'active' : '' }}" href="/rekening">Rekening</a>
                    @if(Auth::guest())
                    <a class="nav-link" href="/login">Masuk</a>
                    <a class="btn btn-primary tombol-nav" href="/register">Daftar</a>
                    @else
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link {{ (request()->is('profil/*')) ? 'active' : '' }} {{ (request()->is('transaksi')) ? 'active' : '' }}"
                                href="{{route('profil')}}">
                                <i class="fas fa-user pr-1 user"></i>
                                {{auth()->user()->name}}
                            </a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{route('profil')}}">Profil</a>
                                <a class="dropdown-item" href="{{route('transaksi')}}">Transaksi</a>
                                <div class="dropdown-divider"></div>
                                <form id="form" action="{{route('logout')}}" method="POST">@csrf</form>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="document.getElementById('form').submit()">Logout</a>
                            </div>
                        </li>
                    </ul>
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- END OF NAVBAR -->
</header>
