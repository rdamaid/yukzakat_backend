@extends('sites.layouts.master')
@section('content')
<!-- Konten Kalkulasi Zakat -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 kalkulasi">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title pb-2">Kalkulasi Zakat Mal</h2>
                    <form class="pt-5 pb-3">
                        <div class="input-title">
                            <label for="jumlah-harta"> Jumlah Harta Anda </label>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="text" class="form-control" id="jumlah-harta" placeholder="100.000" />
                        </div>
                        <div class="subtitle">
                            <label class="sublabel" for="jumlah-harta">
                                Pastikan jumlah harta anda melebihi nishab (85 gram emas)
                            </label>
                        </div>

                        <div class="input-title py-4">
                            <label for="jumlah-harta"> Nilai Zakat </label>
                            <h2>Rp 2.500.000,-</h2>
                        </div>

                        <button type="submit" class="btn btn-block btn-primary tombol">
                            Kalkulasi Zakat
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF Konten Kalkulasi Zakat -->
@endsection
