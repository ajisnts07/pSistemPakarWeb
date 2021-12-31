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
    <title>Dashboard Admin | Sistem Pakar Forward Chaining</title>
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
        idle: 250000
    });
    </script>
  </head>
  <body>
    <?php
      if (isset ($_GET['message'])) {
        $message = $_GET['message'];
        if ($message == 'success') {
          ?>
          <script language="Javascript">
            swal({
              title: 'Berhasil',
              text: 'Data berhasil ditambahkan',
              type: 'success',
              showConfirmButton: true
            });
          </script>
          <?php
        } else if ($message == 'delete') {
          ?>
          <script language="Javascript">
            swal({
              title: 'Berhasil!',
              text: 'Data berhasil dihapus',
              type: 'warning',
              showConfirmButton: true
            });
          </script>
          <?php
        } else if ($message == 'edit') {
          ?>
          <script language="Javascript">
            swal({
              title: 'Berhasil!',
              text: 'Data Berhasil diedit',
              type: 'success',
              showConfirmButton: true
            });
          </script>
          <?php
        }
      }
    ?>
    <!-- Dashboard Admin Start -->
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
        <div class="row">
          <div class="col-sm-8">
            <div class="row d-flex justify-content-around align-items-center">
              <div class="col-3">
                <div class="card p-2 text-center">
                  <a href="#penyakit">
                    <span class="iconify icon mx-auto" data-icon="bx:bxs-virus" data-width="45"></span>
                    <p class="text-white">Penyakit</p>
                  </a>
                </div>
              </div>
              <div class="col-3">
                <div class="card p-2 text-center">
                  <a href="#gejala">
                    <span class="iconify icon mx-auto" data-icon="medical-icon:i-infectious-diseases" data-width="45"></span>
                    <p class="text-white">Gejala</p>
                  </a>
                </div>
              </div>
              <div class="col-3">
                <div class="card p-2 text-center">
                  <a href="#pengetahuan">
                    <span class="iconify icon mx-auto" data-icon="simple-icons:knowledgebase" data-width="45"></span>
                    <p class="text-white">Basis Pengetahuan</p>
                  </a>
                </div>
              </div>
              <div class="col-3">
                <div class="card p-2 text-center">
                  <a href="#aturan">
                    <span class="iconify icon mx-auto" data-icon="codicon:law" data-width="45"></span>
                    <p class="text-white">Aturan</p>
                  </a>
                </div>
              </div>
            </div>
            <h5 class="fw-bold mt-4" id="penyakit">Data Penyakit</h5>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPenyakit">Tambah</button>
            <div class="data bg-white p-3">
              <!-- Table Start -->
              <table class="table table-responsive table-bordered">
                <tbody>
                  <?php
                    $query = mysqli_query ($connect, "SELECT * FROM penyakit") or die (mysqli_error ($connect));
                    while ($penyakit = mysqli_fetch_array ($query)) {
                  ?>
                  <tr style="background-color: #0e63f3; color: #fff">
                    <td>Penyakit</td>
                    <td>:</td>
                    <td class="text-center fw-bold text-capitalize"><?php echo $penyakit['nama_penyakit']; ?></td>
                    <td><a href="<?php echo $penyakit['sumber']; ?>" class="btn btn-secondary m-1" target="_blank">Sumber</a><a href="../data_penyakit/edit_penyakit.php?kode_penyakit=<?php echo $penyakit['kode_penyakit']; ?>" class="btn btn-success m-1">Edit</a><a href="../assets/database/config_deletePenyakit.php?kode_penyakit=<?php echo $penyakit['kode_penyakit']; ?>" class="btn btn-danger m-1">Hapus</a></td>
                  </tr>
                  <tr>
                    <td>Kode</td>
                    <td>:</td>
                    <td colspan="2"><?php echo $penyakit['kode_penyakit']; ?></td>
                  </tr>
                  <tr>
                    <td>Deskripsi</td>
                    <td>:</td>
                    <td colspan="2"><?php echo $penyakit['deskripsi_penyakit']; ?></td>
                  </tr>
                  <tr>
                    <td>Solusi</td>
                    <td>:</td>
                    <td colspan="2"><?php echo $penyakit['solusi']; ?></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- Table End -->
            </div>
            <h5 class="fw-bold mt-4" id="gejala">Data Gejala</h5>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addGejala">Tambah</button>
            <div class="data bg-white p-3">
              <!-- Table Start -->
              <table class="table table-responsive table-striped">
                <thead>
                  <tr>
                    <th style="border-radius: 0.5em 0 0 0">No</th>
                    <th>Kode</th>
                    <th>Nama Gejala</th>
                    <th>Pertanyaan</th>
                    <th style="border-radius: 0 0.5em 0 0">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query ($connect, "SELECT * FROM gejala") or die (mysqli_error ($connect));
                    $no = 1;
                    while ($gejala = mysqli_fetch_array ($query)) {
                  ?>
                  <tr>
                    <th><?php echo $no++; ?></th>
                    <th><?php echo $gejala['kode_gejala']; ?></th>
                    <th class="text-capitalize"><?php echo $gejala['nama_gejala']; ?></th>
                    <th><?php echo $gejala['pertanyaan']; ?></th>
                    <th><a href="../data_gejala/edit_gejala.php?kode_gejala=<?php echo $gejala['kode_gejala']; ?>" class="btn btn-success m-1">Edit</a><a href="../assets/database/config_deleteGejala.php?kode_gejala=<?php echo $gejala['kode_gejala']; ?>" class="btn btn-danger m-1">Hapus</a></th>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- Table End -->
            </div>
            <h5 class="fw-bold mt-4" id="pengetahuan">Basis Pengetahuan</h5>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addBasisPengetahuan">Tambah</button>
            <div class="data bg-white p-3">
              <!-- Table Start -->
              <table class="table table-responsive table-striped">
                <thead>
                  <tr>
                    <th style="border-radius: 0.5em 0 0 0">No</th>
                    <th>Kode</th>
                    <th>Penyakit</th>
                    <th>Gejala</th>
                    <th style="border-radius: 0 0.5em 0 0">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query ($connect, "SELECT * FROM basis_pengetahuan") or die (mysqli_error ($connect));
                    $no = 1;
                    while ($basisPengetahuan = mysqli_fetch_array ($query)) {
                  ?>
                  <tr>
                    <th><?php echo $no++; ?></th>
                    <th><?php echo $basisPengetahuan['kode_pengetahuan']; ?></th>
                    <th class="text-capitalize"><?php echo $basisPengetahuan['penyakit']; ?></th>
                    <th  class="text-capitalize"><?php echo $basisPengetahuan['gejala']; ?></th>
                    <th><a href="../basis_pengetahuan/edit_basisPengetahuan.php?kode_pengetahuan=<?php echo $basisPengetahuan['kode_pengetahuan']; ?>" class="btn btn-success m-1">Edit</a><a href="../assets/database/config_deleteBasisPengetahuan.php?kode_pengetahuan=<?php echo $basisPengetahuan['kode_pengetahuan']; ?>" class="btn btn-danger m-1">Hapus</a></th>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- Table End -->
            </div>
            <h5 class="fw-bold mt-4" id="aturan">Aturan</h5>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addAturan">Tambah</button>
            <div class="data bg-white p-3">
              <!-- Table Start -->
              <table class="table table-responsive table-striped">
                <thead>
                  <tr>
                    <th style="border-radius: 0.5em 0 0 0">No</th>
                    <th>Kode</th>
                    <th>Jika</th>
                    <th>Maka</th>
                    <th style="border-radius: 0 0.5em 0 0">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query ($connect, "SELECT * FROM aturan ORDER BY maka ASC") or die (mysqli_error ($connect));
                    $no = 1;
                    while ($aturan = mysqli_fetch_array ($query)) {
                  ?>
                  <tr>
                    <th><?php echo $no++ ?></th>
                    <th><?php echo $aturan['kode_aturan']; ?></th>
                    <th class="text-uppercase"><?php echo $aturan['jika']; ?></th>
                    <th class="text-uppercase"><?php echo $aturan['maka']; ?></th>
                    <th><a href="../aturan/edit_aturan.php?kode_aturan=<?php echo $aturan['kode_aturan']; ?>" class="btn btn-success m-1">Edit</a><a href="../assets/database/config_deleteAturan.php?kode_aturan=<?php echo $aturan['kode_aturan']; ?>" class="btn btn-danger m-1">Hapus</a></th>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- Table End -->
            </div>
          </div>
          <div class="col-sm-4 mt-4 mt-lg-0">
            <div class="alert alert-info alert-dismissible fade show" role="alert">
              <strong>Halo,</strong><br /><?php echo $user['nama']; ?><span class="iconify ms-2" data-icon="noto:pill" data-width="20"></span>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <h5 class="fw-bold">Data User</h5>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addUser">Tambah</button>
            <div class="data bg-white p-3" style="height: auto">
              <!-- Table Start -->
              <table class="table table-responsive table-striped">
                <thead>
                  <tr>
                    <th style="border-radius: 0.5em 0 0 0">No</th>
                    <th>ID</th>
                    <th>Role</th>
                    <th>Nama</th>
                    <th style="border-radius: 0 0.5em 0 0">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query ($connect, "SELECT * FROM user") or die (mysqli_error ($connect));
                    $no = 1;
                    while ($user = mysqli_fetch_array ($query)) {
                  ?>
                  <tr>
                    <th><?php echo $no++; ?></th>
                    <th><?php echo $user['id_user']; ?></th>
                    <th><?php echo $user['role']; ?></th>
                    <th><?php echo $user['nama']; ?></th>
                    <th><a href="./edit_profile.php?id_user=<?php echo $user['id_user']; ?>" class="btn btn-success m-1">Edit</a><a href="../assets/database/config_deleteUser.php?id_user=<?php echo $user['id_user']; ?>" class="btn btn-danger m-1">Hapus</a></th>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- Table End -->
            </div>
            <div class="col-sm-12 bg-white p-2 mt-4" style="border-radius: 0.5em;">
              <form action="../assets/database/config_editUser.php" method="post">
                <?php
                  $data_user = mysqli_query ($connect, "SELECT * FROM user WHERE id_user = '$_SESSION[id_user]'");
                  $user = mysqli_fetch_array ($data_user);
                ?>
                <div class="p-2">
                  <input type="hidden" name="id_user" value="<?php echo $user['id_user']; ?>">
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
                <button type="submit" class="btn btn-primary mt-3" value="edit">Perbaharui</button>
              </form>
            </div>
            <h5 class="fw-bold mt-4 mb-3">Data Kontak</h5>
            <div class="data bg-white p-3" style="height: auto">
              <!-- Table Start -->
              <table class="table table-responsive table-striped">
                <thead>
                  <tr>
                    <th style="border-radius: 0.5em 0 0 0">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Subjek</th>
                    <th style="border-radius: 0 0.5em 0 0">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $query = mysqli_query ($connect, "SELECT * FROM kontak") or die (mysqli_error ($connect));
                    $no = 1;
                    while ($kontak = mysqli_fetch_array ($query)) {
                  ?>
                  <tr>
                    <th><?php echo $no++; ?></th>
                    <th><?php echo $kontak['nama']; ?></th>
                    <th><?php echo $kontak['email']; ?></th>
                    <th><?php echo $kontak['subject']; ?></th>
                    <th><a href="../assets/database/config_deleteKontak.php?kode_kontak=<?php echo $kontak['kode_kontak']; ?>" class="btn btn-danger m-1">Hapus</a></th>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <!-- Table End -->
            </div>
          </div>
        </div>
      </div>
      <!-- Main End -->
      <!-- Modal Add Penyakit Start -->
      <div class="modal fade" id="addPenyakit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPenyakit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <!-- Modal Header Start -->
            <div class="modal-header">
              <span class="iconify icon me-4" data-icon="bx:bxs-virus" data-width="45"></span>
              <h5>Data Penyakit</h5>
              <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header End -->
            <!-- Modal Body Start -->
            <div class="modal-body">
              <form action="../assets/database/config_addPenyakit.php" method="post">
                <?php
                  $query = mysqli_query ($connect, "SELECT max(kode_penyakit) AS maxId FROM penyakit");
                  $data = mysqli_fetch_array ($query);
                  $kodePenyakit = $data['maxId'];

                  $no = (int) substr ($kodePenyakit, 1, 3);
                  $no++;
                  $code = "P";

                  $kodePenyakit = $code . sprintf ("%02s", $no);
                ?>
                <div class="p-2">
                  <label for="kode_penyakit" class="form-label">Kode</label>
                  <input type="text" class="form-control" name="kode_penyakit" value="<?php echo $kodePenyakit; ?>" autocomplete="off" required readonly/>
                </div>
                <div class="p-2">
                  <label for="nama_penyakit" class="form-label">Nama Penyakit</label>
                  <input type="text" class="form-control text-capitalize" name="nama_penyakit" autocomplete="off" required />
                </div>
                <div class="p-2">
                  <label for="deskripsi_penyakit" class="form-label">Deskripsi</label>
                  <textarea type="text" class="form-control" name="deskripsi_penyakit" autocomplete="off" required rows="5"></textarea>
                </div>
                <div class="p-2">
                  <label for="solusi" class="form-label">Solusi</label>
                  <textarea type="text" class="form-control" name="solusi" autocomplete="off" required></textarea>
                </div>
                <div class="p-2">
                  <label for="sumber" class="form-label">Sumber</label>
                  <input type="text" class="form-control" name="sumber" placeholder="Copy kan link sumber disini..." autocomplete="off" required />
                </div>
                <button type="submit" class="btn btn-primary mt-3 float-end" value="add">Simpan</button>
              </form>
            </div>
            <!-- Modal Body End -->
          </div>
        </div>
      </div>
      <!-- Modal Add Penyakit End -->
      <!-- Modal Add Gejala Start -->
      <div class="modal fade" id="addGejala" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPenyakit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <!-- Modal Header Start -->
            <div class="modal-header">
              <span class="iconify icon me-4" data-icon="medical-icon:i-infectious-diseases" data-width="45"></span>
              <h5>Data Gejala</h5>
              <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header end -->
            <!-- Modal Body Start -->
            <div class="modal-body">
              <form action="../assets/database/config_addGejala.php" method="post">
                <?php
                  $query = mysqli_query ($connect, "SELECT max(kode_gejala) AS maxId FROM gejala");
                  $data = mysqli_fetch_array ($query);
                  $kodeGejala = $data['maxId'];

                  $no = (int) substr ($kodeGejala, 1, 3);
                  $no++;
                  $code = "G";

                  $kodeGejala = $code . sprintf ("%02s", $no);
                ?>
                <div class="p-2">
                  <label for="kode_gejala" class="form-label">Kode</label>
                  <input type="text" class="form-control" name="kode_gejala" value="<?php echo $kodeGejala; ?>" autocomplete="off" required readonly />
                </div>
                <div class="p-2">
                  <label for="nama_gejala" class="form-label">Nama Gejala</label>
                  <input type="text" class="form-control text-capitalize" name="nama_gejala" autocomplete="off" required />
                </div>
                <div class="p-2">
                  <label for="pertanyaan" class="form-label">Pertanyaan</label>
                  <input type="text" class="form-control" name="pertanyaan" autocomplete="off" required />
                </div>
                <button type="submit" class="btn btn-primary mt-3 float-end" value="add">Simpan</button>
              </form>
            </div>
            <!-- Modal Body End -->
          </div>
        </div>
      </div>
      <!-- Modal Add Gejala End -->
      <!-- Modal Add Basis Pengetahuan Start -->
      <div class="modal fade" id="addBasisPengetahuan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPenyakit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <!-- Modal Header Start -->
            <div class="modal-header">
              <span class="iconify icon me-4" data-icon="simple-icons:knowledgebase" data-width="45"></span>
              <h5>Basis Pengetahuan</h5>
              <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header end -->
            <!-- Modal Body Start -->
            <div class="modal-body">
              <form action="../assets/database/config_addBasisPengetahuan.php" method="post">
                <?php
                  $query = mysqli_query ($connect, "SELECT max(kode_pengetahuan) AS maxId FROM basis_pengetahuan");
                  $data = mysqli_fetch_array ($query);
                  $kodePengetahuan = $data['maxId'];

                  $no = (int) substr ($kodePengetahuan, 1, 3);
                  $no++;
                  $code = "B";

                  $kodePengetahuan = $code . sprintf ("%02s", $no);
                ?>
                <div class="p-2">
                  <label for="kode_pengetahuan" class="form-label">Kode</label>
                  <input type="text" class="form-control" name="kode_pengetahuan" value="<?php echo $kodePengetahuan; ?>" autocomplete="off" required readonly>
                </div>
                <div class="p-2">
                  <label for="penyakit" class="form-label">Penyakit</label>
                  <input type="text" class="form-control text-capitalize" name="penyakit" autocomplete="off" required>
                </div>
                <div class="p-2">
                  <label for="gejala" class="form-label">Gejala</label>
                  <input type="text" class="form-control text-capitalize" name="gejala" autocomplete="off" required>
                </div>
                <button type="submit" class="btn btn-primary mt-3 float-end" value="add">Simpan</button>
              </form>
            </div>
            <!-- Modal Body End -->
          </div>
        </div>
      </div>
      <!-- Modal Add Basis Pengetahuan End -->
      <!-- Modal Add Aturan Start -->
      <div class="modal fade" id="addAturan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPenyakit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <!-- Modal Header Start -->
            <div class="modal-header">
              <span class="iconify icon me-4" data-icon="codicon:law" data-width="45"></span>
              <h5>Aturan</h5>
              <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header end -->
            <!-- Modal Body Start -->
            <div class="modal-body">
              <form action="../assets/database/config_addAturan.php" method="post">
                <?php
                  $query = mysqli_query ($connect, "SELECT max(kode_aturan) AS maxId FROM aturan");
                  $data = mysqli_fetch_array ($query);
                  $kodeAturan = $data['maxId'];

                  $no = (int) substr ($kodeAturan, 1, 3);
                  $no++;
                  $code = "A";

                  $kodeAturan = $code . sprintf ("%02s", $no);
                ?>
                <div class="p-2">
                  <label for="kode_aturan" class="form-label">Kode</label>
                  <input type="text" class="form-control" name="kode_aturan" value="<?php echo $kodeAturan; ?>" autocomplete="off" required readonly>
                </div>
                <div class="p-2">
                  <label for="jika" class="form-label">Jika</label>
                  <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" name="jika" autocomplete="off" required />
                </div>
                <div class="p-2">
                  <label for="maka" class="form-label">Maka</label>
                  <input type="text" class="form-control" onkeyup="this.value = this.value.toUpperCase()" name="maka" autocomplete="off" required />
                </div>
                <button type="submit" class="btn btn-primary mt-3 float-end" value="add">Simpan</button>
              </form>
            </div>
            <!-- Modal Body End -->
          </div>
        </div>
      </div>
      <!-- Modal Add Aturan End -->
      <!-- Modal Add User Start -->
      <div class="modal fade" id="addUSer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahPenyakit" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <!-- Modal Header Start -->
            <div class="modal-header">
              <span class="iconify icon me-4" data-icon="healthicons:ui-user-profile" data-width="45"></span>
              <h5>Data User</h5>
              <button type="button" class="btn-close me-2" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal Header end -->
            <!-- Modal Body Start -->
            <div class="modal-body">
              <form action="../assets/database/config_addUser.php" method="post">
                <?php
                  $query = mysqli_query ($connect, "SELECT max(id_user) AS maxId FROM user");
                  $data = mysqli_fetch_array ($query);
                  $idUser = $data['maxId'];

                  $no = (int) substr ($idUser, 3, 3);
                  $no++;
                  $code = "SPK";

                  $idUser = $code . sprintf ("%03s", $no);
                ?>
                <div class="p-2">
                  <input type="hidden" name="id_user" value="<?php echo $idUser; ?>">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control text-capitalize" name="nama" autocomplete="off" required />
                </div>
                <div class="p-2">
                  <label for="alamat" class="form-label">Alamat</label>
                  <input type="text" class="form-control" name="alamat" autocomplete="off" required />
                </div>
                <div class="p-2">
                  <label for="no_telepon" class="form-label">No Telepon</label>
                  <input type="number" class="form-control" name="no_telepon" autocomplete="off" required />
                </div>
                <div class="row p-2">
                  <div class="col">
                    <label for="id_user" class="form-label">ID User</label>
                    <input type="text" class="form-control" placeholder="<?php echo $idUser; ?>" autocomplete="off" required disabled />
                  </div>
                  <div class="col">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select" name="role">
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                    </select>
                  </div>
                </div>
                <div class="p-2">
                  <label for="username" class="form-label">Username</label>
                  <input type="number" class="form-control" name="username" autocomplete="off" required />
                </div>
                <div class="p-2">
                  <label for="password" class="form-label">Password</label>
                  <div class="input-group">
                    <input type="password" class="form-control border-end-0" placeholder="Password" name="password" id="myPassword" autocomplete="off" required />
                    <div class="input-group-text border-start-0 bg-transparent" onclick="showPassword()">
                      <span class="iconify" data-icon="akar-icons:eye-closed" data-width="25"></span>
                    </div>
                  </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3 float-end" value="add">Simpan</button>
              </form>
            </div>
            <!-- Modal Body End -->
            <!-- Modal Body End -->
          </div>
        </div>
      </div>
      <!-- Modal Add User End -->
    </section>
    <!-- Dashboard Admin End -->

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
