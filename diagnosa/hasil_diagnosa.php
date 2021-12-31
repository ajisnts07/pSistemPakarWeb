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
    <title>Hasil Diagnosa | Sistem Pakar Forward Chaining</title>
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
    <!-- Hasil Diagnosa Start -->
    <section class="data-detail d-flex justify-content-center align-items-center">
        <div class="container ps-4 pe-4 pt-2 pb-2">
            <a href="./diagnosa.php">
                <span class="iconify icon mb-4" data-icon="eva:arrow-back-outline" data-width="45"></span>
            </a>
            <div class="data bg-white p-3">
                <div class="navbar-text fw-bold fs-5 text-dark mb-3">Hasil Diagnosa</div>
                <?php
                if(isset($_POST['diagnosa'])) {
                  $x = $_POST['cek'];
                  $xx = implode('AND',$x);
                  $query = mysqli_query ($connect, "SELECT penyakit.*, aturan.* FROM penyakit, aturan WHERE aturan.maka=penyakit.kode_penyakit AND aturan.jika='$xx'");
                  if (mysqli_num_rows ($query) == 0) {
                    header ("location: ./diagnosa.php?message=failed");
                  } else {
                    $row = mysqli_fetch_array ($query);
                  }
                }
                ?>
                <table class="table table-bordered table-responsive">
                    <tr>
                        <td>Gejala</td>
                        <td>:</td>
                        <td class="text-capitalize">
                            <?php
                                if (isset($x[0])) {
                                    $query1 = mysqli_query ($connect, "SELECT * FROM gejala WHERE kode_gejala = '$x[0]'");
                                    $row1 = mysqli_fetch_array ($query1);
                                    echo "<ul>
                                    <li>$row1[nama_gejala]</li>
                                    </ul>";
                                } else {
                                    echo "";
                                }
                            ?>
                            <?php
                                if (isset($x[1])) {
                                    $query2 = mysqli_query ($connect, "SELECT * FROM gejala WHERE kode_gejala = '$x[1]'");
                                    $row2 = mysqli_fetch_array ($query2);
                                    echo "<ul>
                                    <li>$row2[nama_gejala]</li>
                                    </ul>";
                                } else {
                                    echo "";
                                }
                            ?>
                            <?php
                                if (isset($x[2])) {
                                    $query3 = mysqli_query ($connect, "SELECT * FROM gejala WHERE kode_gejala = '$x[2]'");
                                    $row3 = mysqli_fetch_array ($query3);
                                    echo "<ul>
                                    <li>$row3[nama_gejala]</li>
                                    </ul>";
                                } else {
                                    echo "";
                                }
                            ?>
                        </td>
                        <td><button class="btn btn-primary float-end" onclick="window.print()">Cetak Hasil</button></td>
                    </tr>
                    <tr>
                        <td>Penyakit</td>
                        <td>:</td>
                        <td colspan="2" class="text-capitalize fw-bold"><?php echo $row['nama_penyakit']; ?></td>
                    </tr>
                    <tr>
                        <td>Deskripsi</td>
                        <td>:</td>
                        <td colspan="2"><?php echo $row['deskripsi_penyakit']; ?></td>
                    </tr>
                    <tr>
                        <td>Solusi</td>
                        <td>:</td>
                        <td colspan="2"><?php echo $row['solusi']; ?></td>
                    </tr>
                    <tr>
                        <td>Sumber</td>
                        <td>:</td>
                        <td colspan="2"><?php echo $row['sumber']; ?></td>
                    </tr>
                </table>
            </div>
            <a href="./diagnosa.php" class="btn btn-primary mt-3 float-end">Ulangi Diagnosa</a>
        </div>
    </section>
    <!-- Hasil Diagnosa End -->
  </body>

    <!-- Javascript -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <!-- Icon Iconify -->
    <script src="https://code.iconify.design/2/2.1.0/iconify.min.js"></script>
</html>