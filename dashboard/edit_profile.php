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
    <!-- Website Title -->
    <title>Edit Profile | Sistem Pakar Forward Chaining</title>
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
        <h5 class="fw-bold mt-4">Edit Profile</h5>
        <div class="card bg-white text-dark p-3 col-sm-5 mx-auto">
          <form action="../assets/database/config_editUser.php" method="post">
            <?php
                $id_user = $_GET['id_user'];
                $query = mysqli_query ($connect, "SELECT * FROM user WHERE id_user = '$id_user'") or die (mysqli_error ($connect));
                $user = mysqli_fetch_array ($query);
            ?>
            <div class="p-2">
              <input type="hidden" name="id_user" value="<?php echo $id_user; ?>">
              <label for="nama" class="form-label">Nama</label>
              <input type="text" class="form-control" name="nama" value="<?php echo $user['nama']; ?>" autocomplete="off" required />
            </div>
            <div class="p-2">
              <label for="alamat" class="form-label">Alamat</label>
              <input type="text" class="form-control" name="alamat" value="<?php echo $user['alamat']; ?>" autocomplete="off" required />
            </div>
            <div class="p-2">
              <label for="no_telepon" class="form-label">No Telepon</label>
              <input type="number" class="form-control" name="no_telepon" value="<?php echo $user['no_telepon']; ?>" autocomplete="off" required />
            </div>
            <div class="row p-2">
              <div class="col">
                <label for="id_user" class="form-label">ID User</label>
                <input type="text" class="form-control" placeholder="<?php echo $user['id_user']; ?>" autocomplete="off" required disabled />
              </div>
              <div class="col">
                <label for="role" class="form-label">Role</label>
                <input type="text" class="form-control" name="role" value="<?php echo $user['role']; ?>" readonly>
              </div>
            </div>
            <div class="p-2">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" value="<?php echo $user['username']; ?>" autocomplete="off" required />
            </div>
            <div class="p-2">
              <label for="password" class="form-label">Password</label>
              <div class="input-group">
                <input type="password" class="form-control border-end-0" placeholder="Password" name="password" value="<?php echo $user['password']; ?>" id="myPassword" autocomplete="off" required />
                <div class="input-group-text border-start-0 bg-transparent" onclick="showPassword()">
                  <span class="iconify" data-icon="akar-icons:eye-closed" data-width="25"></span>
                </div>
              </div>
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
