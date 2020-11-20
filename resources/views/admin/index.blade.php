@extends('admin.layouts.master')
@section('content')
<!-- CONTENT -->
<main>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <div class="row justify-content-center py-3 pr-4">
            <div class="col-md-3 py-5">
                <div class="card dashboard">
                    <div class="card-header ">
                        USERS
                    </div>
                    <div class="card-body">
                        <div class="body-card-db">
                            60
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-5">
                <div class="card dashboard">
                    <div class="card-header">
                        Transaksi
                    </div>
                    <div class="card-body">
                        <div class="body-card-db">
                            16
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-5">
                <div class="card dashboard">
                    <div class="card-header">
                        Belum Selesai
                    </div>
                    <div class="card-body">
                        <div class="body-card-db">
                            7
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 py-5">
                <div class="card dashboard">
                    <div class="card-header">
                        Selesai
                    </div>
                    <div class="card-body">
                        <div class="body-card-db">
                            8
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection
