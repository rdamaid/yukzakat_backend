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
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jenis Zakat</th>
                                <th>Detail Transaksi</th>
                                <th>Tanggal</th>
                                <th>Bukti Pembayaran</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $index => $transaction)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{ucwords($transaction->user->name)}}</td>
                                <td>{{$transaction->jenis}}</td>
                                <td>{{$transaction->nominal}}</td>
                                <td>{{$transaction->created_at}}</td>
                                <td>
                                    <a href="{{ url('img/transaksi_img/'.$transaction->bukti_pembayaran) }}" target="_blank">Lihat Gambar</a>
                                </td>
                                @if ($transaction->status == 0)
                                    <td>
                                        <span type="button" transaction-id="{{$transaction->id}}" 
                                            class="btn btn-danger btn-block status">Belum Selesai</span>
                                    </td>
                                    @else
                                    <td>
                                        <span type="button" transaction-id="{{$transaction->id}}" 
                                            class="btn btn-success btn-block status">Selesai</span>
                                    </td>
                                @endif
                                <td class="center">
                                    <a href="#" transaksi-id="{{$transaction->id}}" type="button"
                                        class="btn btn-danger btn-sm delete">Delete
                                    </a>
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

@section('script')
<script type="text/javascript">
    $('.delete').click(function (e) {
        e.preventDefault();
        var transaksi_id = $(this).attr('transaksi-id');
        swal({
                title: "Yakin?",
                text: "Ingin menghapus data transaksi dengan id " + transaksi_id + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/" + "transaksi/" + transaksi_id + "/delete";
                    
                } else {

                }
              
            });
    });

    $('.status').click(function (e) {
        e.preventDefault();
        var transaction_id = $(this).attr('transaction-id');
        swal({
                title: "Yakin?",
                text: "Anda ingin mengubah status pembayaran dengan id " + transaction_id + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willUpdate) => {
                console.log(willUpdate);
                if (willUpdate) {
                    window.location = "/admin/" + "transaksi/" + transaction_id + "/update";
                } 
            });
    });

</script>
@endsection
@endsection
