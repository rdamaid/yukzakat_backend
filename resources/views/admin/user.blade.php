@extends('admin.layouts.master')
@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header judul pt-4">
                Daftar User
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>Id</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td>{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->alamat}}</td>
                                <td>{{$user->no_telepon}}</td>
                                <td>{{$user->role}}</td>
                                <td class="center">
                                    <a href="/admin/user/{{$user->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" user-id="{{$user->id}}" type="button" class="btn btn-danger btn-sm delete">Delete</a>
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
$('.delete').click(function(e) {
    e.preventDefault();
    var user_id = $(this).attr('user-id');
    swal({
            title: "Yakin?",
            text: "Ingin dihapus data user dengan id " + user_id + "?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            console.log(willDelete);
            if (willDelete) {
                window.location = "/admin/" + "user/" + user_id + "/delete";
            } else {

            }
        });
});    
</script>
@endsection
@endsection
