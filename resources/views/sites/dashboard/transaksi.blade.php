@extends('sites.layouts.master')
@section('content')
<!-- Konten Profil -->
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 mt-3">
            <div class="row justify-content-center">
                <div class="col-4">
                    <!-- SIDEBAR STRT -->
                    <div class="sidebar">
                        <center>
                            <img src="{{ asset('img/sites/default.jpg')}}" class="profile-img" alt="profil" />
                            <h4>Ustad Bajigur</h4>
                        </center>
                        <a href="{{route('profil')}}" class="{{ (request()->is('profil/*')) ? 'active' : '' }}">
                            <i class="fas fa-user"></i><span>Profil</span>
                        </a>
                        <a href="/transaksi" class="{{ (request()->is('transaksi')) ? 'active' : '#' }}">
                            <i class="fas fa-money-bill"></i><span>Transaksi</span>
                        </a>
                        <a href="{{route('logout')}}" class="keluar-profile">
                            <i class="fas fa-gear"></i><span>Keluar</span>
                        </a>
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <div class="col-8">
                    <div class="content">
                        <div class="transaksi-title">
                            <h1>Transaksi Saya</h1>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Detail Transaksi</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Status Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Detail Transaksi</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Status Pembayaran</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr>
                                            <td>Rp. 2.500.000,-</td>
                                            <td>Haji Bolot</td>
                                            <td>12 Desember 2012</td>
                                            <td>
                                                <span class="btn btn-danger btn-block">Belum Selesai</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Rp. 2.500.000,-</td>
                                            <td>Haji Bajigur</td>
                                            <td>12 Desember 2012</td>
                                            <td>
                                                <span class="btn btn-success btn-block">Selesai</span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF Konten Profil -->
@endsection
