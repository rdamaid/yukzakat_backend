@extends('sites.layouts.master')
@section('content')
<!-- Konten Beranda -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-10 info-panel">
            <div class="row">
                <div class="col-lg mt-3 info-rekening">
                    <div class="rekening">
                        <h1>Nomor Rekening</h1>
                        <img src="{{ asset('img/sites/mandiri_syariah.png') }}" alt="rekening-yukzakat">
                        <h2>0160043929</h2>
                        <p>Salurkan Zakat Anda melalui rekening atas nama <strong>DKM AH-KAS</strong></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF Konten Beranda -->
@endsection
