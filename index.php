<?php
  ob_start();
  session_start();
  error_reporting();

  include './assets/database/connection.php';
?>

<html lang="en">
  <head>
    <!-- Copyright @ 2021 Sistem Pakar Pendeteksi Penyakit Menggunakan Metode Forward Chaining -->
    <!-- Meta TAG -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, target-densitydpi=device-dpi" />
    <meta name="title" content="Sistem Pakar Pendeteksi Penyakit Menggunakan Metode Forward Chaining" />
    <meta name="description" content="Sistem informasi yang berisi pengetahuan seorang pakar sehingga dapat digunakan untuk konsultasi" />
    <meta name="keywords" content="sistem, pakar, metode, forward, chaining, pendeteksi, penyakit, umum" />
    <!-- Website Title -->
    <title>Sistem Pakar Forward Chaining</title>
    <!-- Favicon Website -->
    <link rel="icon" href="./assets/img/logo.png" alt="logo" />
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="./assets/css/main.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Sweet Alert 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
  </head>
  <body>
      <?php
      if (isset ($_GET['message'])) {
        $message = $_GET['message'];
        if ($message == 'success') {
          ?>
          <script language="Javascript">
              swal({
                title: 'Berhasil!',
                text: 'Pesan anda berhasil dikirim',
                type: 'success',
                showConfirmButton: true
              }).then(function() {
                window.location = "index.php";
              });
          </script>
          <?php
        } else {
          ?>
          <script language="Javascript">
              swal({
                title: 'Gagal!',
                text: 'Coba ulangi beberapa saat lagi',
                type: 'error',
                showConfirmButton: true
              }).then(function() {
                window.location = "index.php";
              });
          </script>
          <?php
        }
      }
    ?>
    <!-- Home Start -->
    <section class="home">
      <div class="container">
        <!-- Header Start -->
        <header>
          <nav class="navbar navbar-expand-lg navbar-light pt-lg-3">
            <div class="container">
              <div class="navbar-text fs-5 fw-bold">SistemPakar.</div>
              <div class="navbar-brand">
                <img src="./assets/img/logo_only.png" alt="logo_only" loading="lazy" />
              </div>
              <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="navbar">
                <span class="iconify" data-icon="heroicons-outline:menu-alt-3" data-width="35"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbar">
                <div class="navbar-nav ms-auto">
                  <a href="#" class="nav-link me-lg-3">Home</a>
                  <a href="#about" class="nav-link me-lg-3">Tentang</a>
                  <a href="#contact" class="nav-link me-lg-3">Kontak</a>
                  <a href="panduan.php" class="nav-link me-lg-3">Panduan</a>
                  <a href="./signup/signup.php" class="btn btn-primary mb-0 mt-4 mt-sm-0">Daftar</a>
                </div>
              </div>
            </div>
          </nav>
        </header>
        <!-- Header End -->
        <!-- Main Start -->
        <div class="row">
          <div class="col-sm-6 ps-4 ps-lg-0">
            <h1 class="fw-bold mt-lg-5">
              Sistem Pakar <br />
              Pendeteksi Penyakit
            </h1>
            <p class="mt-lg-4">Diagnosakan keluhan anda pada kami sekarang</p>
            <a href="./signin/signin.php" class="btn btn-primary mt-2">Coba Diagnosa</a>
          </div>
          <div class="col-sm-6">
            <img src="./assets/img/doctor-woman.png" alt="doctor-woman" loading="lazy" />
          </div>
        </div>
        <div class="banner col-10 mx-auto position-relative p-2 mb-3 mb-lg-0">
          <div class="container">
            <div class="row text-center">
              <div class="col-4" style="border-right: 0.1em solid #f7f9fe">
                <h1>3+</h1>
                <p>Penyakit</p>
              </div>
              <div class="col-4" style="border-right: 0.1em solid #f7f9fe">
                <h1>8+</h1>
                <p>Gejala</p>
              </div>
              <div class="col-4">
                <h1>5+</h1>
                <p>Pengguna</p>
              </div>
            </div>
          </div>
        </div>
        <!-- Main End -->
      </div>
    </section>
    <!-- Home End -->
    <!-- About Start -->
    <section class="about" id="about">
      <div class="container pt-5 pb-5">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-sm-6">
            <img class="pb-3 pb-lg-0" src="./assets/img/star.png" alt="start" loading="lazy" />
          </div>
          <div class="col-sm-6">
            <div class="container p-3 p-lg-0 text">
              <h1 class="fw-bold mb-3">Sistem Pakar Metode Forward Chaining</h1>
              <p>Sistem informasi yang berisi pengetahuan seorang pakar sehingga dapat digunakan untuk konsultasi</p>
              <p class="mt-1">Forward chaining merupakan salah satu dari metode inferensi yang berarti metode ini dapat digunakan dalam proses sistem berbasis pengetahuan untuk menghasilkan informasi baru</p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- About End -->
    <!-- Step Start -->
    <section class="step">
      <div class="container pt-5 pb-5">
        <h1 class="fw-bold mb-3">
          Cari Tahu Penyakit <br />
          Berdasarkan Gejalamu
        </h1>
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-sm-4">
            <span class="iconify icon mb-2" data-icon="bi:card-list" data-width="45"></span>
            <h5 class="fw-bold">Daftar Akun</h5>
            <p>Kunjungi laman daftar, isi biodata anda dengan lengkap dan benar, semuanya gratis</p>
          </div>
          <div class="col-sm-4">
            <span class="iconify icon mb-2" data-icon="akar-icons:chat-question" data-width="45"></span>
            <h5 class="fw-bold">Jawab Pertanyaan</h5>
            <p>Akan muncul pertanyaan terkait gejala, anda tinggal jawab sesuai gejala yang sedang anda alami</p>
          </div>
          <div class="col-sm-4">
            <span class="iconify icon mb-2" data-icon="carbon:report" data-width="45"></span>
            <h5 class="fw-bold">Hasil Diagnosa</h5>
            <p>Hasil dari diagnosa akan tampil sesuai pertanyaan yang anda jawab dan informasi solusinya</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Step End -->
    <!-- Try Start -->
    <section class="try">
      <div class="container pt-5 pb-5">
        <div class="box col-12 p-5">
          <h1>
            Silahkan Coba Diagnosa <br />
            Jika Timbul Gejala
          </h1>
          <a href="./signin/signin.php" class="btn btn-secondary mt-3">Coba Diagnosa</a>
        </div>
      </div>
    </section>
    <!-- Try End -->
    <!-- Footer Start -->
    <footer class="footer">
      <div class="container pt-5 pb-5">
        <div class="row">
          <div class="col-sm-4">
            <h5>SistemPakar.</h5>
            <p>Bandung, Indonesia</p>
            <a href="#" target="_blank">
              <img class="maps" src="./assets/img/maps.png" alt="maps" loading="lazy" />
            </a>
            <div class="social-media mt-4 mb-3 mb-lg-0">
              <span class="iconify me-2" data-icon="akar-icons:facebook-fill" data-width="30"></span>
              <span class="iconify me-2" data-icon="ant-design:instagram-filled" data-width="30"></span>
              <span class="iconify" data-icon="akar-icons:twitter-fill" data-width="30"></span>
            </div>
          </div>
          <div class="col-sm-4">
            <h5>Link Penting</h5>
            <ul>
              <li>Kunjungi halaman diagnosa</li>
              <li>Lihat hasil diagnosa yang telah dilakukan</li>
            </ul>
          </div>
          <div class="col-sm-4" id="contact">
            <h5>Hubungi Kami</h5>
            <form action="./assets/database/config_addKontak.php" method="post">
              <?php
                $query = mysqli_query ($connect, "SELECT max(kode_kontak) AS maxId FROM kontak");
                $data = mysqli_fetch_array ($query);
                $kodeKontak = $data['maxId'];

                $no = (int) substr ($kodeKontak, 1, 3);
                $no++;
                $code = "K";

                $kodeKontak = $code . sprintf ("%03s", $no);
              ?>
              <input type="hidden" value="<?php echo $kodeKontak; ?>" name="kode_kontak">
              <input type="text" class="form-control mb-2 mt-4" placeholder="Nama..." name="nama" autocomplete="off" required />
              <input type="email" class="form-control mb-2" placeholder="Email..." name="email" autocomplete="off" required />
              <textarea type="text" class="form-control mb-4" placeholder="Tulis Pesan..." name="subject" autocomplete="off" required></textarea>
              <button type="submit" class="btn btn-primary float-end" value="add">Kirim</button>
            </form>
          </div>
        </div>
      </div>
      <p class="p-2 text-center">Copyright <span class="iconify-inline" data-icon="ant-design:copyright-circle-outlined" data-width="15"></span> 2021 Sistem Pakar Pendeteksi Penyakit Menggunakan Metode <b>Forward Chaining</b></p>
    </footer>
    <!-- Footer End -->

    <!-- Javascript -->
    <script src="./assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Icon Iconify -->
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  </body>
</html>
