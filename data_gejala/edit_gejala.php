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
    <title>Edit Gejala | Sistem Pakar Forward Chaining</title>
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
    <!-- Edit Gejala Start -->
    <section class="admin pb-3">
      <!-- Navbar Start -->
      <nav class="navbar navbar-light">
        <div class="container">
          <div class="navbar-brand">
            <img src="../assets/img/logo_only.png" alt="logo_only" loading="lazy" />
          </div>
          <div class="navbar-text fw-bold fs-5">Dashboard Admin</div>
          <div class="navbar-nav ms-auto d-inline">
            <a class="btn btn-primary fw-bold me-2"><?php echo $user['role']; ?></a>
            <div class="dropdown d-inline">
              <a href="#" class="photo-profile" role="button" id="dropdownProfile" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="../assets/img/pp.png" alt="pp" loading="lazy" />
              </a>
              <ul class="dropdown-menu position-absolute" aria-labelledby="dropdownProfile">
                <li>
                  <a href="../assets/database/config_signout.php" class="dropdown-item"><span class="iconify icon me-2" data-icon="cil:account-logout" data-width="35"></span>Logout</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </nav>
      <!-- Navbar End -->
      <!-- Main Start -->
      <div class="container p-3">
        <a href="../dashboard/dashboard_admin.php">
          <span class="iconify icon" data-icon="eva:arrow-back-outline" data-width="45"></span>
        </a>
        <h5 class="fw-bold mt-4">Edit Gejala</h5>
        <div class="card bg-white text-dark p-3 col-sm-5 mx-auto">
          <form action="../assets/database/config_editGejala.php" method="post">
            <?php
              $kodeGejala = $_GET['kode_gejala'];
              $query = mysqli_query ($connect, "SELECT * FROM gejala WHERE kode_gejala = '$kodeGejala'") or die (mysqli_error ($connect));
              $gejala = mysqli_fetch_array ($query);
            ?>
            <div class="p-2">
              <label for="kode_gejala" class="form-label">Kode</label>
              <input type="text" class="form-control" name="kode_gejala" value="<?php echo $kodeGejala; ?>" autocomplete="off" required readonly />
            </div>
            <div class="p-2">
              <label for="nama_gejala" class="form-label">Nama Gejala</label>
              <input type="text" class="form-control text-capitalize" name="nama_gejala" value="<?php echo $gejala['nama_gejala']; ?>" autocomplete="off" required />
            </div>
            <div class="p-2">
              <label for="pertanyaan" class="form-label">Pertanyaan</label>
              <input type="text" class="form-control" name="pertanyaan" value="<?php echo $gejala['pertanyaan']; ?>" autocomplete="off" required >
            </div>
            <button type="submit" class="btn btn-primary mt-3 float-end" value="edit">Perbaharui</button>
          </form>
        </div>
      </div>
      <!-- Main End -->
    </section>
    <!-- Edit Gejala Start -->

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
