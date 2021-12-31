<?php
  ob_start();
  session_start();
  error_reporting();

  include '../assets/database/connection.php';
?>

<?php
  $data_user = mysqli_query ($connect, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'");
  $user = mysqli_fetch_array ($data_user);
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
    <meta name="googlebot" content="noindex" />
    <!-- Website Title -->
    <title>Diagnosa | Sistem Pakar Forward Chaining</title>
    <!-- Favicon Website -->
    <link href="../assets/img/logo.png" alt="logo" rel="icon" />
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- Sweet Alert 2 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css" rel="stylesheet" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
    <!-- jQuery idle -->
    <script type="text/javascript" src="../assets/js/jquery.idle.js"></script>
    <script>
    $(document).idle({
        onIdle: function(){
            window.location="../assets/database/config_signout.php";                
        },
        idle: 200000
    });
    </script>
  </head>
  <body>
  <?php
      if (isset ($_GET['message'])) {
        $message = $_GET['message'];
        if ($message == 'failed') {
          ?>
          <script language="Javascript">
            swal({
              title: 'Gagal',
              text: 'Tidak ditemukan penyakit dengan gejala tersebut, cek kembali Basis Pengetahuan',
              type: 'error',
              showConfirmButton: true
            });
          </script>
          <?php
        } 
      }
    ?>
    <!-- Diagnosa Start -->
    <section class="data-detail">
    <!-- Sidebar Start -->
      <div class="sidebar bg-white">
        <div class="container p-3">
          <div class="navbar-brand fw-bold mb-4"><img src="../assets/img/logo_only.png" alt="logo_only" loading="lazy" /> SistemPakar.</div>
          <div class="mb-3">
            <p class="fw-bold fs-5">Sistem</p>
            <a href="../dashboard/dashboard.php"><span class="iconify icon me-2" data-icon="bx:bxs-dashboard" data-width="45"></span>Dashboard</a>
          </div>
          <div class="mb-3">
            <p class="fw-bold fs-5">Menu</p>
            <a href="../data_penyakit/data_penyakit.php"><span class="iconify icon me-2" data-icon="bx:bxs-virus" data-width="45"></span> Data Penyakit</a>
            <a href="../data_gejala/data_gejala.php"><span class="iconify icon me-2" data-icon="medical-icon:i-infectious-diseases" data-width="45"></span>Data Gejala</a>
            <a href="../basis_pengetahuan/basis_pengetahuan.php"><span class="iconify icon me-2" data-icon="simple-icons:knowledgebase" data-width="45"></span>Basis Pengetahuan</a>
            <a href="../aturan/aturan.php"><span class="iconify icon me-2" data-icon="codicon:law" data-width="45"></span>Aturan</a>
            <a href="#" class="active"><span class="iconify icon me-2" data-icon="fa-solid:diagnoses" data-width="45" data-height="45"></span>Diagnosa</a>
          </div>
          <div class="mb-3">
            <p class="fw-bold fs-5">Pengaturan</p>
            <a href="../dashboard/profil.php"><span class="iconify icon me-2" data-icon="healthicons:ui-user-profile" data-width="45"></span>Profil</a>
            <a href="../assets/database/config_signout.php"><span class="iconify icon me-2" data-icon="cil:account-logout" data-width="45"></span>Keluar</a>
          </div>
        </div>
      </div>
    <!-- Sidebar End -->
    <!-- Main Start -->
    <main>
        <div class="container ps-4 pe-4 pt-2 pb-2">
        <!-- Navbar Start -->
          <nav class="navbar navbar-light">
            <div class="navbar-brand">
              <img src="../assets/img/logo_only.png" alt="logo_only" loading="lazy" />
            </div>
            <div class="navbar-text fw-bold fs-5">Diagnosa</div>
            <div class="navbar-nav ms-auto d-inline">
              <a class="btn btn-primary fw-bold me-2"><?php echo $user['role']; ?></a>
              <div class="dropdown d-inline">
                <a href="#" class="photo-profile" role="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../assets/img/pp.png" alt="pp" loading="lazy" />
                </a>
                <ul class="dropdown-menu position-absolute" aria-labelledby="dropdownProfile">
                  <li>
                    <a href="../dashboard/profil.php" class="dropdown-item"><span class="iconify icon me-2" data-icon="healthicons:ui-user-profile" data-width="35"></span>Profile</a>
                  </li>
                  <li>
                    <a href="../assets/database/config_signout.php" class="dropdown-item"><span class="iconify icon me-2" data-icon="cil:account-logout" data-width="35"></span>Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
        <!-- Navbar End -->
        <div class="data bg-white p-3">
            <div class="alert alert-info fade show">
                <span class="iconify icon me-2 d-block mb-2" data-icon="medical-icon:i-infectious-diseases" data-width="45"></span>
                <strong>Petunjuk : </strong>Pilih 3 gejala
            </div>
            <h5 class="fw-bold mb-3">Ceklis gejala berikut, sesuai dengan apa yang anda rasakan!</h5>
            <form action="./hasil_diagnosa.php" method="post" name="diagnosa" enctype="multipart/form-data">
                <?php
                    $query = mysqli_query ($connect, "SELECT * FROM gejala ORDER BY RAND()");
                    $no = 0;
                    while ($data = mysqli_fetch_array ($query)) {
                        $x = $data['nama_gejala'];
                        $no++;
                ?>
                <?php echo $no; ?> . <?php echo "<h5 class='d-inline'>$data[pertanyaan]</h5>" ?><br>
                <input type="checkbox" class="form-check-input ms-3 me-2 fs-4 mb-3" value="<?php echo $data['kode_gejala']; ?>" name="cek[]"> Ya<br>
                <?php } ?>
                <button type="submit" class="btn btn-primary float-end" value="Coba Diagnosa" name="diagnosa">Analisa</button>
            </form>
        </div>
        </div>
    </main>
    <!-- Main End -->
    <!-- Navigations Start -->
    <div class="navigations text-center">
        <a href="../data_penyakit/data_penyakit.php">
          <span class="iconify icon-nav" data-icon="bx:bxs-virus" data-width="25"></span>
          <p>Penyakit</p>
        </a>
        <a href="../data_gejala/data_gejala.php">
          <span class="iconify icon-nav" data-icon="medical-icon:i-infectious-diseases" data-width="25"></span>
          <p>Gejala</p>
        </a>
        <div class="icon-home p-3 tex-center">
          <a href="../dashboard/dashboard.php">
            <span class="iconify" data-icon="bytesize:home" style="color: white" data-width="30"></span>
          </a>
        </div>
        <a href="../basis_pengetahuan/basis_pengetahuan.php">
          <span class="iconify icon-nav" data-icon="simple-icons:knowledgebase" data-width="25"></span>
          <p>Pengetahuan</p>
        </a>
        <a href="../aturan/aturan.php">
          <span class="iconify icon-nav" data-icon="codicon:law" data-width="25"></span>
          <p>Aturan</p>
        </a>
      </div>
    <!-- Navigations End -->
    </section>
    <!-- Diagnosa End -->

    <!-- Javascript -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Icon Iconify -->
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
  </body>
</html>