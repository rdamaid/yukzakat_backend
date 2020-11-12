<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="{{ asset('css/sites/bootstrap.min.css') }}"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <!-- FONT LATO -->
    <link
      href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="{{ asset('css/sites/style.css') }}" />
    <link rel="shortcut icon" href="{{ asset('img/sites/logo-ipb.png')}}" />
    <title>Kalkulasi Zakat</title>
  </head>
  <body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <div class="container">
        <a href="#">
          <img
            src="{{ asset('img/sites/logo.png') }}"
            alt="logo"
            class="logo"
          />
        </a>
        <a class="navbar-brand pl-3" href="/">YUKZAKAT</a>
        <button
          class="navbar-toggler"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNavAltMarkup"
          aria-controls="navbarNavAltMarkup"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-link" href="/"
              >Beranda</a
            >
            <li class="nav-item dropdown">
              <a
                class="navbarDropdownMenuLink nav-link active"
                href="#"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                Zakat
                <i class="fa fa-chevron-left"></i>
              </a>
              <div
                class="dropdown-menu"
                aria-labelledby="navbarDropdownMenuLink"
              >
                <a
                  class="dropdown-item"
                  href="/kalkulasi-zakat"
                  >Kalkulasi Zakat</a
                >
                <a
                  class="dropdown-item"
                  href="bayar-zakat"
                  >Pembayaran Zakat</a
                >
              </div>
            </li>
            <a class="nav-link" href="/rekening"
              >Rekening</a
            >
            <a class="nav-link" href="/login"
              >Masuk</a
            >
            <a
              class="btn btn-primary tombol-nav"
              href="register"
              >Daftar</a
            >
          </div>
        </div>
      </div>
    </nav>
    <!-- END OF NAVBAR -->

    <!-- Jumbotron Card -->
    <div class="jumbotron jumbotron-fluid jumbot">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 pt-4">
            <h1 class="py-2">Kalkulasi Zakat</h1>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item bread-text">
                  <a href="/kalkulasi-zakat">Zakat</a>
                </li>
                <li
                  class="breadcrumb-item active bread-text"
                  aria-current="page"
                >
                  Kalkulasi Zakat
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>
    <!-- End of Jumbotron Card -->

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
                  <input
                    type="text"
                    class="form-control"
                    id="jumlah-harta"
                    placeholder="100.000"
                  />
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

    <!-- FOOTER -->
    <footer>
      <!-- Copyright -->
      <div class="footer-copyright footer-all text-center py-3 mt-5">
        <span> © YukZakat 2020 </span>
        <span> <a href="#">Tentang Kami</a> </span>
      </div>

      <!-- Copyright -->
    </footer>
    <!-- END OF FOOTER -->

    <!-- <script src="/assets/sites/js/script.js"></script> -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script src="{{ asset('js/sites/bootstrap.min.js') }}"></script>
  </body>
</html>
