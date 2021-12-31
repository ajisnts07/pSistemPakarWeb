<?php
  ob_start();
  session_start();
  error_reporting();

  include '../assets/database/connection.php';
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
    <title>Daftar | Sistem Pakar Forward Chaining</title>
    <!-- Favicon Website -->
    <link rel="icon" href="../assets/img/logo.png" alt="logo" />
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <meta name="googlebot" content="noindex" />
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
                text: 'Anda bisa login menggunakan akun tersebut',
                type: 'success',
                showConfirmButton: true
              }).then(function() {
                window.location = "../signin/signin.php";
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
                window.location = "../signup/signup.php";
              });
          </script>
          <?php
        }
      }
    ?>
    <!-- Signup Start -->
    <section class="signup">
      <div class="container-fluid">
        <div class="row">
          <div class="col-sm-5 order-2 order-lg-first" id="signup">
            <div class="container p-3">
              <a href="../index.php">
                <span class="iconify icon mb-4" data-icon="eva:arrow-back-outline" data-width="45"></span>
              </a>
              <h1 class="fw-bold mb-4">Daftar</h1>
              <form action="../assets/database/config_signup.php" method="post">
                <?php
                  $query = mysqli_query ($connect, "SELECT max(id_user) AS maxId FROM user");
                  $data = mysqli_fetch_array ($query);
                  $idUser = $data['maxId'];

                  $no = (int) substr ($idUser, 3, 3);
                  $no++;
                  $code = "SPK";

                  $idUser = $code . sprintf ("%03s", $no)
                ?>
                <div class="line">
                  <span class="badge ms-3">Profil</span>
                  <input type="hidden" name="id_user" value="<?php echo $idUser; ?>">
                  <input type="text" class="form-control fs-4 mb-3 mt-4" placeholder="Nama" name="nama" autocomplete="off" required style="text-transform: capitalize;" />
                  <input type="text" class="form-control fs-4 mb-3" placeholder="Alamat" name="alamat" autocomplete="off" required />
                  <input type="number" class="form-control fs-4 mb-4" placeholder="No Telepon" name="no_telepon" autocomplete="off" required />
                </div>
                <div class="line">
                  <span class="badge ms-3">Akun</span>
                  <div class="row mb-3">
                    <div class="col">
                      <input type="text" class="form-control fs-4 mt-4" placeholder="<?php echo $idUser; ?>" disabled />
                    </div>
                    <div class="col">
                      <select class="form-select fs-4 mt-4" name="role">
                        <option value="user" selected>User</option>
                      </select>
                    </div>
                  </div>
                  <input type="text" class="form-control fs-4 mb-3" placeholder="Username" name="username" autocomplete="off" required />
                  <div class="input-group mb-5">
                    <input type="password" class="form-control fs-4 border-end-0" placeholder="Password" name="password" id="myPassword" autocomplete="off" required />
                    <div class="input-group-text border-start-0 bg-transparent" onclick="showPassword()">
                      <span class="iconify" data-icon="akar-icons:eye-closed" data-width="25"></span>
                    </div>
                  </div>
                  <button type="submit" class="btn btn-primary mb-2" style="width: 100%" value="signup">Daftar</button>
                  <p>Sudah Punya Akun? <a href="../signin/signin.php">Masuk</a></p>
                </div>
              </form>
            </div>
          </div>
          <div class="col-sm-7 col-bg">
            <div class="container text-center p-3">
              <h1>Selamat Bergabung!</h1>
              <p>Silahkan lengkapi data dengan benar untuk mendaftar</p>
              <a href="#signup">
                <span class="iconify icon m-3 btn-down mx-auto" data-icon="bi:chevron-double-down" data-width="40"></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Signup End -->

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
