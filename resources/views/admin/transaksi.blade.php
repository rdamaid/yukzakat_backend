@extends('admin.layouts.master')
@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header judul pt-4">
                Daftar Semua Transaksi User
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Nama</th>
                                <th>Detail Transaksi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Nama</th>
                                <th>Detail Transaksi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <tr>
                                <td>Haji Bolot</td>
                                <td>Rp. 2.500.000,-</td>
                                <td>12 Desember 2012</td>
                                <td><span class="btn btn-danger btn-block">Belum Selesai</span></td>
                                <td class="center">
                                    <a href=#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                            <tr>
                                <td>Haji Kontol</td>
                                <td>Rp. 2.500.000,-</td>
                                <td>12 Desember 2012</td>
                                <td><span class="btn btn-success btn-block">Selesai</span></td>
                                <td>
                                    <a href=#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>

                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
