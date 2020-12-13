@extends('admin.layouts.master')
@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header judul pt-4">
                Daftar Transaksi User
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Detail Transaksi</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{$transaction->id}}</td>
                                <td>{{$transaction->jenis}}</td>
                                <td>{{$transaction->nominal}}</td>
                                <td>{{$transaction->created_at}}</td>
                                @if ($transaction->status == 0)
                                    <td>
                                        <span class="btn btn-danger btn-block">Belum Selesai</span>
                                    </td>
                                    @else
                                    <td>
                                        <span class="btn btn-success btn-block">Selesai</span>
                                    </td>
                                @endif
                                <td class="center">
                                    <a href="#" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" class="btn btn-danger btn-sm">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
