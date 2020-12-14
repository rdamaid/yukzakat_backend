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
                      <select id="jenis-zakat" name="rate" class="form-control" onChange="change(this);">
                        <option disabled value="Pilih Jenis Zakat" selected>Pilih Jenis Zakat</option>
                        <option value="0.025">Zakat Maal</option>
                        <option value="0.025">Zakat Penghasilan</option>
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
                            <input type="number" min="0" class="form-control" id="jumlah-harta" placeholder="0" />
                        </div>

                        <div class="subtitle">
                            <label id="sub-zakat-maal" class="sublabel" for="jumlah-harta" style="display: none">
                                Pastikan jumlah harta anda melebihi nishab (85 gram emas).
                                Standar harga emas yang digunakan untuk 1 gramnya adalah Rp800.000.
                            </label>
                        </div>

                        <div class="input-title">
                            <label id="title-nilai-emas" for="title-nilai-emas" style="display: none"> Nilai emas, perak, dan/atau permata </label>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text" id="title-rp-nilai-emas" style="display: none">Rp</div>
                            </div>
                            <input type="number" min="0" class="form-control" id="nilai-emas" placeholder="0" style="display: none"/>
                        </div>

                        <div class="input-title">
                            <label for="hasil-hitung-zakat"> Hasil Kalkulasi </label>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp</div>
                            </div>
                            <input type="text" min="0" class="form-control" id="hasil-hitung-zakat" placeholder="0" readonly="readonly"/>
                        </div>
                    </form>
                    <button id="button-lanjut-bayar" class="btn btn-block btn-primary tombol" style="display: none" onclick="copyAndRedirect()">
                        Lanjut Ke Pembayaran
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!--Script Menghitung Zakat -->
<script type="text/javascript">
  // Copy hasil kalkulasi dan redirect ke halaman Pembayaran
  function copyAndRedirect() {
    // cek apakah ia wajib bayar zakat mal atau tidak
    var getJumlahHarta = document.getElementById("jumlah-harta").value;
    var getNilaiEmas = document.getElementById("nilai-emas").value;
    if (getJumlahHarta >= (getNilaiEmas * 85)) {
      var getHasilKalkulasi = document.getElementById("hasil-hitung-zakat");
      getHasilKalkulasi.select();
      getHasilKalkulasi.setSelectionRange(0,99999); // metode for mobile devices
      document.execCommand("copy"); // copy hasil kalkulasi ke clipboard

      // alert("Hasil kalkulasi telah dicopy: Rp" + getHasilKalkulasi.value); // kasih alert
      window.location="/bayar-zakat"; // redirect ke halaman pembayaran
    } else {
      alert("Anda tidak WAJIB membayat Zakat Maal.");
    }
  }

  // Show Subtitle when Jenis Zakat selected
  function change(obj) {
    var str0 = "Pilih Jenis Zakat";
    var str1 = "Zakat Maal";
    var str2 = "Zakat Penghasilan";

    var selectBox = obj;
    var selected = selectBox.options[selectBox.selectedIndex].text;

    var subZakatMaal = document.getElementById("sub-zakat-maal");
    var buttonLanjutBayar = document.getElementById("button-lanjut-bayar");
    var titleNilaiEmas = document.getElementById("title-nilai-emas");
    var rpNilaiEmas = document.getElementById("title-rp-nilai-emas");
    var inptNilaiEmas = document.getElementById("nilai-emas");

    if (str0.localeCompare(selected) == 0) {
      subZakatMaal.style.display = "block";
      //buttonLanjutBayar.style.display = "block";
    } else if (str1.localeCompare(selected) == 0) {
      // display input dan subtitle Zakat Maal
      subZakatMaal.style.display = "block"
      buttonLanjutBayar.style.display = "block";
      titleNilaiEmas.style.display = "block";
      rpNilaiEmas.style.display = "block";
      inptNilaiEmas.style.display = "block";

      // clear value
      document.getElementById("nilai-emas").value = "";
      document.getElementById("jumlah-harta").value = "";
    } else if (str2.localeCompare(selected) == 0) {
      // hide input dan subtitle Zakat Maal
      subZakatMaal.style.display = "none";
      buttonLanjutBayar.style.display = "block";
      titleNilaiEmas.style.display = "none";
      rpNilaiEmas.style.display = "none";
      inptNilaiEmas.style.display = "none";

      // clear value
      document.getElementById("nilai-emas").value = "";
      document.getElementById("jumlah-harta").value = "";
    }
  }

  // get hasil kalkulasi ketika input dimasukan saat itu juga
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
