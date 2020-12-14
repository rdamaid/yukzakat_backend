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
                                <th>Jenis Transaksi</th>
                                <th>Detail Transaksi</th>
                                <th>Tanggal</th>
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

</script>
@endsection

@endsection

