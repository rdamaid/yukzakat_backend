@extends('admin.layouts.master')
@section('content')
<main>
    <div class="container-fluid">
        <div class="card mb-4">
            <div class="card-header judul pt-4">
                Edit Data User
            </div>
            <div class="card-body">
                <form action="/admin/user/{{$users->id}}/update" class="form-horizontal needs-validation" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input required name="name" value="{{$users->name}}" type="text" class="form-control" id="name"
                            aria-describedby="name" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="nama">Email</label>
                        <input required name="email" value="{{$users->email}}" type="text" class="form-control"
                            id="email" aria-describedby="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <label for="nama">Password</label>
                        <input required name="password" type="password" class="form-control"
                            id="password" aria-describedby="password" placeholder="*********">
                    </div>
                    <div class="form-group">
                        <label for="nama">No. Telepon</label>
                        <input required name="no_telepon" value="{{$users->no_telepon}}" type="text"
                            class="form-control" id="no_telepon" aria-describedby="no_telepon"
                            placeholder="No. Telepon">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea required name="alamat" class="form-control" id="alamat"
                            rows="3">{{$users->alamat}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" class="form-control" id="role">
                            <option value="admin" @if($users -> role =="admin") selected @endif >Admin</option>
                            <option value="user" @if($users -> role =="user") selected @endif >User</option>                     
                        </select>
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>

        </div>
    </div>
</main>
@endsection
