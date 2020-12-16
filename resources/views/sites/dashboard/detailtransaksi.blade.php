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
                                            <td>Rp. {{number_format($transaction->nominal)}}</td>
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
                                @if($transaction->bukti_pembayaran == 'default.jpg' && $transaction->status == 0)
                                <div class="mt-4 mb-5">
                                    <h6>1. Silahkan transfer pembayaran pada <strong>ATM Terdekat/Mobile Banking</strong> anda</h6>
                                    <h6>2. Masukkan no Rek. Mandiri Syariah <strong>0160043929 a.n DKM AH-KAS</strong></h6>
                                    <h6>3. Lakukan pembayaran sesuai jumlah yang tertera, yaitu <strong>Rp. {{$transaction->nominal}}</strong></h6>
                                    <h6>4. Setelah selesai, silahkan upload bukti pembayaran anda</h6>
                                </div>
                                @endif
                                @if($transaction->bukti_pembayaran != 'default.jpg' && $transaction->status == 0)
                                <div class="text-center mt-5 mb-4">
                                    <h4><strong>Bukti Pembayaran Anda Sedang di Proses</strong></h4>
                                </div>
                                @endif
                                @if($transaction->status == 0)
                                <form method="POST" action="{{ url('/transaksi/show/' .$transaction->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row justify-content-center">
                                        @if($transaction->bukti_pembayaran == 'default.jpg')
                                        <div class="form-group col-md-6">
                                            <center>
                                                <img src="{{asset('img/transaksi_img/'.$transaction->bukti_pembayaran)}}"
                                                    class="profile-pic mt-1" alt="profil" id="output" />
                                            </center>
                                            <div class="sub-pic">
                                                <input type="file" name="bukti_pembayaran" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                        <!-- <div class="form-group col-md-6">
                                            <div class="sub-pic">
                                                <input type="file" name="bukti_pembayaran" onchange="loadFile(event)">
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-info btn-block" style="margin: 15px;">
                                            Upload Bukti Pembayaran
                                        </button>
                                        @endif
                                    </div>
                                </form>
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

<script>
    var loadFile = function (event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function () {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

</script>
@endsection
