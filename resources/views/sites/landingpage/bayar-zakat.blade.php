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
                            <input required type="number" class="form-control" name="nominal" id="jumlah-harta" placeholder="Jumlah Zakat | Contoh : 10000000" />
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
                          <label>Transfer Via Bank:</label>
                          <select required class="form-control" name="jenis">
                            <option>Mandiri Syariah</option>
                            <option>BNI Syariah</option>
                            <option>BRI Syariah</option>
                            <option>BTPN Syariah</option>
                          </select>
                        </div>
                        <div class="form-group">
                            <input required type="email" class="form-control" name="email" id="email" placeholder="Alamat E-Mail" />
                        </div>
                        <div class="form-group">
                            <input required type="number" class="form-control" name="phone" id="phone" placeholder="Nomor Telepon" />
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" id="deskripsi" rows="3"
                                placeholder="Tuliskan doa atau dukungan atas zakat ini"></textarea>
                        </div>
                        <button type="submit" class="btn btn-block btn-primary tombol">
                          Bayar Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END OF Konten Kalkulasi Zakat -->
@endsection
