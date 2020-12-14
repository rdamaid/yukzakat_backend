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
                        <div class="profil-title">
                            <h1>Profil Saya</h1>
                        </div>
                        <div class="row justify-content-center">
                            <div class="list-profil">
                                <form method="POST" action="{{ route('save-profil') }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-row justify-content-center">
                                        <div class="form-group col-md-6">
                                            <center>
                                                <img src="{{asset('img/user_img/'.$users->user_image)}}"
                                                    class="profile-pic mt-1" alt="profil" id="output" />
                                            </center>
                                            <div class="sub-pic">
                                                <input type="file" name="user_image" onchange="loadFile(event)">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h6 style="color: red">* <label for="name" style="color: black">Nama</label>
                                        </h6>
                                        <input type="text" required class="form-control" id="name" name="name"
                                            value="{{$users->name}}" />
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <h6 style="color: red">* <label for="email"
                                                    style="color: black">Email</label></h6>
                                            <input type="email" required class="form-control" id="email" name="email"
                                                value="{{$users->email}}" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <h6 style="color: red">* <label for="no_telepon" style="color: black">No.
                                                    Telpon</label></h6>
                                            <input type="number" required class="form-control" id="no_telepon"
                                                name="no_telepon" value="{{$users->no_telepon}}" />
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">
                                            Alamat
                                        </label>
                                        <textarea class="form-control" id="alamat" rows="3" name="alamat">{{$users->alamat}}
                                        </textarea>
                                    </div>
                                    <div class="form-group mb-0">
                                        <center>
                                            <h5>Password</h5>
                                        </center>
                                    </div>
                                    <div class="form-row">

                                        <div class="form-group col-md-6">
                                            <label for="password" style="color: black">Password Baru</label>
                                            <input type="password" class="form-control" id="password"
                                                name="password" placeholder="******" />
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="password_confirmation" style="color: black">
                                                Konfirmasi Password</label>
                                            <input type="password" class="form-control"
                                                id="password_confirmation" name="password_confirmation"
                                                placeholder="******" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success btn-block">
                                        SIMPAN
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF KONTENT -->

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
