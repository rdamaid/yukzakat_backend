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
                                <th style="width: 320px;">Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $index => $user)
                            <tr>
                                <td>{{$index +1 }}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->alamat}}</td>
                                <td>{{$user->no_telepon}}</td>
                                <td class="center">
                                    <a href="/admin/user/{{$user->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" user-id="{{$user->id}}" type="button"
                                        class="btn btn-danger btn-sm delete">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header judul pt-4">
                <div class="judulAdmin">
                    Daftar Admin
                    <button class="btn btn-info" type="button" data-toggle="modal" data-target="#modalTambah">
                        + Tambah Admin
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th style="width: 320px;">Alamat</th>
                                <th>Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $index => $admin)
                            <tr>
                                <td>{{$index + 1}}</td>
                                <td>{{$admin->name}}</td>
                                <td>{{$admin->email}}</td>
                                <td>{{$admin->alamat}}</td>
                                <td>{{$admin->no_telepon}}</td>
                                <td class="center">
                                    <a href="/admin/user/{{$admin->id}}/edit" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="#" user-id="{{$admin->id}}" type="button"
                                        class="btn btn-danger btn-sm delete">Delete</a>
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

<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="modalTambah" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form action="/admin/user/add" class="form-horizontal needs-validation" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input required name="name" type="text" class="form-control" id="name" aria-describedby="name"
                            placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input required name="email" type="email" class="form-control" id="email"
                            aria-describedby="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input required name="password" type="password" class="form-control" id="password"
                            aria-describedby="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label for="nama">No. Telepon</label>
                        <input required name="no_telepon" type="number" class="form-control" id="no_telepon"
                            aria-describedby="no_telepon" placeholder="No. Telepon">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea required name="alamat" class="form-control" id="alamat" rows="3"
                            placeholder="Alamat"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" id="role">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-info">Tambah</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
