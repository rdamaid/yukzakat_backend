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
                        <label for="name">Nama</label>
                        <input required name="name" value="{{$users->name}}" type="text" class="form-control" id="name"
                            aria-describedby="name" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input required name="email" value="{{$users->email}}" type="email" class="form-control"
                            id="email" aria-describedby="email" placeholder="Email">
                    </div>
                   
                    <div class="form-group">
                        <label for="no_telepon">No. Telepon</label>
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

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input name="password" type="password" class="form-control"
                            id="password" aria-describedby="password" placeholder="*********">
                    </div>
                    <div class="form-group">
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input name="password_confirmation" type="password" class="form-control"
                            id="password_confirmation" aria-describedby="password_confirmation" placeholder="*********">
                    </div>
                    <button type="submit" class="btn btn-warning">Update</button>
                </form>
            </div>

        </div>
    </div>
</main>
@endsection
