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
                                            <th>Detail</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($transactions as $transaction)
                                        <tr>
                                            <td>Rp. {{$transaction->nominal}}</td>
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
                                            <td><button onclick="showDetail('{{$transaction->id}}')" class="btn btn-xs btn-info button">Detail</button></td>
                                        </tr>
                                        @endforeach
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

<script type="text/javascript">
    function showDetail(transactionId) {
        window.location = '/transaksi/show/' + transactionId;
    }
</script>
