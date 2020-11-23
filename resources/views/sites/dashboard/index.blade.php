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
                            <img src="{{asset('img/user_img/'.$users->user_image)}}" class="profile-pic mt-5" alt="profil" />
                            <div class="list-profil">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th scope="row">Nama</th>
                                            <td style="text-transform: capitalize;">{{$users->name}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{$users->email}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">No. Telp</th>
                                            <td>{{$users->no_telepon}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Alamat</th>
                                            <td class="py-2">
                                            {{$users->alamat}}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <a href="{{url("/profil/{$users->id}/edit")}}"
                                    class="btn btn-secondary btn-lg btn-block active mt-5" role="button"
                                    aria-pressed="true">
                                    Edit Profil
                                </a>
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
