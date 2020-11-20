@extends('sites.layouts.master')
@section('content')
<!-- Konten Kalkulasi Zakat -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 kalkulasi">
            <div class="card text-center">
                <div class="card-body">
                    <h2 class="card-title">Kalkulasi Zakat</h2>
                    <form class="pt-5 pb-3">
                      <div class="input-title">
                          <label for="hasil-hitung-zakat"> Jenis Zakat </label>
                      </div>
                      <select id="jenis-zakat" name="rate" class="form-control">
                        <option disabled value="Pilih Jenis Zakat" selected>Pilih Jenis Zakat</option>
                        <option value="0.025">Zakat Maal</option>
                        <option disabled value="0">Zakat Penghasilan</option>
                      </select>

                      <div class="subtitle">
                          <label class="sublabel">

                          </label>
                      </div>

                        <div class="input-title">
                            <label for="jumlah-harta"> Jumlah Harta Anda </label>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="text" min="0" class="form-control" id="jumlah-harta" placeholder="0" />
                        </div>
                        <div class="subtitle">
                            <label class="sublabel" for="jumlah-harta">
                                Pastikan jumlah harta anda melebihi nishab (85 gram emas).
                                Standar harga emas yg digunakan untuk 1 gram nya adalah Rp800.000,-.
                            </label>
                        </div>

                        <div class="input-title">
                            <label for="hasil-hitung-zakat"> Hasl Kalkulasi </label>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="text" min="0" class="form-control" id="hasil-hitung-zakat" placeholder="0" />
                        </div>

                        <!--
                        <button type="submit" class="btn btn-block btn-primary tombol">
                            Kalkulasi Zakat
                        </button>
                        -->
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Script Menghitung Zakat -->
<script type="text/javascript">
  document.addEventListener('DOMContentLoaded', function() {
    document.getElementById("jumlah-harta").addEventListener("input", calculator);
    document.getElementById("jenis-zakat").addEventListener("change", changeZakat);

    function calculator() {
      let amount = document.getElementById("jumlah-harta").value;
      let jenisZakat = document.getElementById("jenis-zakat").value;
      //document.getElementById("jumlah-harta").value = amount.toLocaleString('id');
      if (jenisZakat == "Pilih Jenis Zakat") {
        document.getElementById("hasil-hitung-zakat").setAttribute("placeholder", "Silakan pilih jenis zakat Anda.");
      } else {
        let compute = amount * jenisZakat; //Rumus Kalkulasi Zakat
        if (compute<0) {
          document.getElementById("hasil-hitung-zakat").setAttribute("placeholder", "Error!");
        } else {
          document.getElementById("hasil-hitung-zakat").value = compute.toLocaleString('id');;
        }
      }
    }

    function changeZakat() {
      let amount = document.getElementById("jumlah-harta").value;
      let jenisZakat = document.getElementById("jenis-zakat").value;
      //document.getElementById("jumlah-harta").value = amount.toLocaleString('id');
      let compute = amount * jenisZakat;
      compute.toLocaleString();
      if (compute < 0) {
        document.getElementById("hasil-hitung-zakat").setAttribute("placeholder", "Error!");
      } else {
        document.getElementById("hasil-hitung-zakat").value = compute.toLocaleString('id');;
      }
    }

    let menu = document.querySelectorAll('Pilih Jenis Zakat');
    M.FormSelect.init(menu,{});
  });
</script>

<!-- END OF Konten Kalkulasi Zakat -->
@endsection
