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
                        <a href="/profil" class="{{ (request()->is('profil')) ? 'active' : '' }}">
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
                        <div class="profil-title">
                            <h1>Profil Saya</h1>
                        </div>
                        <div class="row justify-content-center">
                            <img src="{{ asset('img/sites/default.jpg')}}" class="profile-pic mt-5" alt="profil" />
                            <div class="list-profil">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama</th>
                                            <td>Haji Bajigur</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>bajigur@mail.com</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No. Telp</th>
                                            <td>0822123456</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat</th>
                                            <td class="py-2">
                                                Jalan Bersama No. 114, Kelurahan Tembilahan, Kec.
                                                Tembilahan Hulu, Kabupaten Indragiri Hilir, Provinsi
                                                Riau
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="/template/pages/sites/edit-profil.html"
                                    class="btn btn-secondary btn-lg btn-block active mt-5" role="button"
                                    aria-pressed="true">
                                    Edit Profil
                                </a>
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
