@extends('sites.layouts.master')
@section('content')
<!-- Konten Beranda -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 info-panel">
            <div class="row">
                <div class="col-lg">
                    <a href="/kalkulasi-zakat">
                        <img class="mx-auto d-block" src="{{ asset('img/sites/info-1.png') }}" alt="kalkulator-zakat" />
                    </a>
                    <p>
                        Gunakan kalkulator zakat untuk menghitng jumlah zakat yang harus
                        anda bayarkan.
                        <br />
                        <br />
                        Pastikan harta anda sudah melebihi nishab (85 gram emas)
                    </p>
                </div>
                <div class="col-lg">
                    <a href="/bayar-zakat">
                        <img class="mx-auto d-block" src="{{ asset('img/sites/info-2.png') }}" alt="bayar-zakat" />
                    </a>
                    <p>
                        Sudah mengetahui berapa zakat anda? <br />
                        Silakan langsung mengisikan nominalnya dan melakukan pembayaran
                        zakat di sini.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF Konten Beranda -->
@endsection
