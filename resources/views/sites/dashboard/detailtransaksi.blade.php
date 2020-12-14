@extends('sites.layouts.master')
@section('content')
<!-- Konten Profil -->
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-12 mt-3">
            <div class="row justify-content-center">
                <div class="col-4">
                    <!-- SIDEBAR STRT -->
                    @include('sites.layouts.includes._sidebar')
                    <!-- END SIDEBAR -->
                </div>
                <div class="col-8">
                    <div class="content">
                        <div class="transaksi-title">
                            <h1>Detail Transaksi</h1>
                        </div>
                        <div class="row justify-content-center mt-5">
                            <div class="table-responsive">
                                <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Total</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Tanggal</th>
                                            <th>Status Pembayaran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$transaction->nominal}}</td>
                                            <td>{{$transaction->jenis}}</td>
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
                                        </tr>
                                    </tbody>
                                </table>
                                @if ($transaction->status == 0)
                                    <button class="btn btn-info btn-block">Upload Bukti Pembayaran</button>
                                @endif
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
