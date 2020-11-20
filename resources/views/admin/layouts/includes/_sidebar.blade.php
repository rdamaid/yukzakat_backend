<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading judul">Admin Dashboard</div>
                <a class="nav-link {{ (request()->is('/admin/dashboard')) ? 'active' : '' }}"
                    href="{{route('admindashboard')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-tachometer-alt"></i>
                    </div>
                    Beranda
                </a>
                <a class="nav-link {{ (request()->is('/admin/transaksi')) ? 'active' : '' }}"
                    href="{{route('admintransaksi')}}">
                    <div class="sb-nav-link-icon">
                        <i class="fas fa-money-bill"></i>
                    </div>
                    Transaksi
                </a>
            </div>
    </nav>
</div>
