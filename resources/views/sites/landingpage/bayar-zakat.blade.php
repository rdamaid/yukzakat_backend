@extends('sites.layouts.master')
@section('content')
<!-- Konten Kalkulasi Zakat -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 kalkulasi">
            <div class="card text-center">
                <div class="card-body">
                    <h1 class="card-title-2 pb-2">Detail Pembayaran Zakat</h1>
                    <form class="pt-1 pb-3" method="post" action="{{ route('bayar') }}">
                      @csrf
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="text" class="form-control" name="nominal" id="jumlah-harta" placeholder="100000" />
                        </div>
                        <div class="subtitle">
                            <label class="sublabel" for="jumlah-harta">
                                *Jumlah donasi diatas dihitung dengan kalkulator
                            </label>
                        </div>

                        <div class="form-group">
                            <input type="text" class="form-control" id="nama" placeholder="Nama Lengkap" />
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="jenis" id="jenis" placeholder="Jenis" />
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Alamat E-Mail" />
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" name="phone" id="phone" placeholder="Nomor Telepon" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="deskripsi" rows="3"
                                placeholder="Tuliskan doa atau dukungan atas zakat ini"></textarea>
                        </div>

                        <!-- <button type="submit" class="btn btn-block btn-primary tombol">
              Kalkulasi Zakat
            </button> -->
            <button type="submit" class="btn btn-block btn-primary tombol">
                Bayar Sekarang
            </button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-lg-5 kalkulasi">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title-2 pb-2">Pilih Metode Pembayaran</h2>
                    <form class="pt-1 pb-3 pb-5">
                        <div class="card-pembayaran mb-5">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pembayaran" id="gopay"
                                    value="option1" />
                                <label class="form-check-label" for="gopay">
                                    <img src="{{ asset('img/sites/gopay.png') }}" alt="Logo Gopay" />
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pembayaran" id="ovo"
                                    value="option2" />
                                <label class="form-check-label" for="ovo">
                                    <img src="{{ asset('img/sites/ovo.png') }}" alt="Logo Ovo" />
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pembayaran" id="dana"
                                    value="option3" />
                                <label class="form-check-label" for="dana">
                                    <img src="{{ asset('img/sites/dana.png') }}" alt="Logo Dana" />
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="pembayaran" id="bni"
                                    value="option4" />
                                <label class="form-check-label" for="bni">
                                    <img src="{{ asset('img/sites/bni.png') }}" alt="Logo BNI" />
                                </label>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- END OF Konten Kalkulasi Zakat -->
@endsection
