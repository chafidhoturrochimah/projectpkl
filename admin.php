<?php
include 'backend/cek.php';
require 'backend/koneksi.php';
include 'backend/tambahjob.php';
include 'backend/update.php';
include 'backend/updatestatus.php';
include 'backend/tambahSyarat.php';
include 'backend/tambahPengumuman.php';
include 'backend/updateAdmin.php';
include 'backend/tambahAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Online Pelatihan Kerja DISNAKER</title>

    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lobster">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript>
        <link rel="stylesheet" href="assets/css/noscript.css" />
    </noscript>
</head>

<body class="is-preload">
    <!-- Wrapper -->
    <div id="wrapper">
        <nav id="nav">
                <ul>
                    <li><a href="#pendaftar">Pendaftar</a></li>
                    <li><a href="#job">Pelatihan</a></li>
                    <li><a href="#persyaratan">Persyaratan</a></li>
                    <li><a href="#pengumuman">Pengumuman</a></li>
                    <li><a href="#tambahAdmin">Tambah Admin</a></li>
                </ul>
        </nav>
        <div id="main">
            <!-- First Section -->
            <section id="pendaftar" class="main special">
                <div align="right"><a href="logout.php" class="btn btn-danger">Logout</a></div>
                <header class="major">
                    <h2><strong>Kelola Pendaftar</strong></h2>
                </header>
                <table id="table2" class="display" width="100%">
                    <thead style="background-color:#2b2b2b;color:#fff">
                        <tr>
                            <th>Register</th>
                            <th>Posisi</th>
                            <th>Nama</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $getregistrant = mysqli_query($conn, "select * from registrant r, job j where r.idjob=j.id");

                        while ($reg = mysqli_fetch_array($getregistrant)) {
                            //main
                            $id = $reg['idreg'];
                            $date = $reg['date'];
                            $posisi = $reg['jobname'];
                            $nama = $reg['name'];
                            $nik = $reg['nik'];
                            $gender = $reg['gender'];
                            $dob = $reg['dob'];

                            $alamat = $reg['alamat'];
                            $telepon = $reg['telepon'];
                            $motivational = $reg['motivational'];
                            $foto = $reg['foto'];
                            $ktp = $reg['ktp'];

                            $bday = new DateTime($dob);
                            $today = new Datetime(date('m.d.y'));
                            $diff = $today->diff($bday);
                            $status = $reg['status']

                        ?>
                            <tr>
                                <td><?= $date; ?></td>
                                <td><?= $posisi; ?></td>
                                <td><?= $nama; ?></td>
                                <td><?= $status; ?></td>
                                <td><button type="button" class="button primary small" data-toggle="modal" data-target="#view<?= $id; ?>">Detail</button>
                                    <button type="button" class="button small" style="background-color:orange;" data-toggle="modal" data-target="#updatereg<?= $id; ?>"><font color="white">Ubah Status</font></button>
                                </td>
                            </tr>
                            <div class="modal fade" id="updatereg<?= $id; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Update Status Pendaftaran <?= $nama; ?></h4>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <select name="updatestatus">
                                                        <option selected values="Opsi">Opsi</option>
                                                        <option value="Lulus">Lulus</option>
                                                        <option value="Tidak Lulus">Tidak Lulus</option>
                                                    </select>
                                                    <input type="hidden" name="updateid" value="<?= $id; ?>">
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="updatereg">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>
                            <!-- The Modal -->
                            <div class="modal fade" id="view<?= $id; ?>">
                                <form method="post">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title"><?= $posisi; ?></h4>
                                            </div>

                                            <!-- Modal body -->
                                            <div class="modal-body">
                                            
                                                <h2><?= $nama; ?>, <?= $gender[0]; ?>, <?= $diff->y; ?></h2>
                                                <br>
                                                <p><?= $motivational; ?></p>
                                                <br>
                                                <img src="img/foto/<?= $foto; ?>" alt=""> &nbsp 
                                                <img src="img/ktp/<?= $ktp; ?>" alt="">
                                                <br><br>
                                                <p><?= $nik; ?></p>
                                                <p><?= $alamat; ?></p>
                                                <a target="_blank" href="https://wa.me/<?= $telepon; ?>" class="btn btn-success">Send Whatsapp</a>
                                            </div>

                                            <input type="hidden" name="idpendaftar" value="<?= $id; ?>">

                                            <!-- Modal footer -->
                                            <div class="modal-footer">
                                                <button type="submit" name="delete" class="btn btn-danger" style="background-color:red">
                                                    <font color="white">Delete</font>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        <?php
                        };

                        if (isset($_POST['delete'])) {
                            $lihatid = $_POST['idpendaftar'];
                            $hapus = mysqli_query($conn, "delete from registrant where idreg='$lihatid'");
                            if ($hapus) {
                                echo 'Berhasil <meta http-equiv="refresh" content="1;url=admin.php" />';
                            } else {
                                echo 'Gagal menghapus <meta http-equiv="refresh" content="1;url=admin.php" />';
                            };
                        }

                        ?>
                        
                    </tbody>
                </table>
                <br>
                <form method="POST" name="form1" action="cetakpendaftar.php">
                    <div class="modal-body">
                    <select name="pelatihan1" class="isian-formulir isian-formulir-border">
                        <?php
                        $sql_pelatihan = mysqli_query($conn, "SELECT * FROM job");
                        while($data_pelatihan = mysqli_fetch_array($sql_pelatihan)){
                        ?>
                        <option value="<?=$data_pelatihan['id'];?>">
                        <?php echo $data_pelatihan['jobname'];?></option>
                        <?php
                        }
                        ?>
                    </select>
                    </div>
                    <div align="center"><button type="submit" class="btn btn-danger"  style="background-color:#B22222;" name="cetak_pdf"><font color = "white">Cetak PDF</font></button></div>
                </form>
                <br>
            </section>

            <section id="job" class="main special">
                <header class="major">
                    <h2><strong>Kelola Job</strong></h2>
                </header>
                <br>
                <div align="right"><button type="button" class="primary" data-toggle="modal" data-target="#myModal">Tambah Job Baru</button></div>
                <br>
                <div class="data-tables datatable-dark">
                    <table id="table1" class="display" width="100%">
                        <thead style="background-color:#2b2b2b;color:#fff">
                            <tr>
                                <th>Posisi Tersedia</th>
                                <th>Periode</th>
                                <th>Maks Pendaftaran</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getdata = mysqli_query($conn, "select * from job");
                            while ($data = mysqli_fetch_array($getdata)) {
                                $idjob = $data['id'];
                                $namajob = $data['jobname'];
                                $descjob = $data['jobdesc'];
                                $mulai = date_format(date_create($data['jobstart']), "d M Y");
                                $selesai = date_format(date_create($data['jobend']), "d M Y");
                                $periode = $mulai . " - " . $selesai;
                                $deadline = date_format(date_create($data['registerend']), "d M Y");
                                $jobloc = $data['jobloc'];
                                $workingtype = $data['workingtype'];

                            ?>

                                <tr>
                                    <form method="post">
                                        <input type="hidden" name="idj" value="<?= $idjob; ?>">
                                        <td><?= $namajob; ?></td>
                                        <td><?= $periode; ?></td>
                                        <td><?= $deadline; ?></td>
                                        <td>
                                        <button type="button" class="button primary small" data-toggle="modal" data-target="#edit<?= $idjob; ?>">Edit</button>
                                        <button type="submit" class="button small" style="background-color:red;" name="deletejob">
                                                <font color="white">Delete</font></button>
                                        </td>
                                    </form>
                                </tr>


                                <!-- The Modal -->
                                <div class="modal fade" id="edit<?= $idjob; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit <?= $namajob; ?></h4>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="updatejobname" class="form-control" value="<?= $namajob; ?>"><br>

                                                    <textarea name="updatedesc"><?= $descjob; ?></textarea><br>

                                                    Start Date: <input type="date" name="updatestart" class="form-control" value="<?= $data['jobstart']; ?>"><br>

                                                    End Date: <input type="date" name="updateend" class="form-control" value="<?= $data['jobend']; ?>"><br>

                                                    End Registration: <input type="date" name="updatedeadline" class="form-control" value="<?= $data['registerend']; ?>"><br>

                                                    <input type="text" name="updatejobloc" class="form-control" value="<?= $jobloc; ?>"><br>

                                                    <select name="updateworkingtype">
                                                        <option selected values="WFH">WFH</option>
                                                        <option value="WFO">WFO</option>
                                                        <option value="Mix">MIX WFH-WFO / Rolling</option>
                                                    </select>
                                                    <input type="hidden" name="updateid" value="<?= $idjob; ?>">
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="update">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            };

                            if (isset($_POST['deletejob'])) {
                                $idj = $_POST['idj'];
                                $querydelete = mysqli_query($conn, "delete from job where id='$idj'");

                                if ($querydelete) {
                                    echo 'Berhasil
                            <meta http-equiv="refresh" content="1;url=admin.php" />';
                                } else {
                                    echo 'Gagal
                            <meta http-equiv="refresh" content="3;url=submit.php" />';
                                };
                            };

                            ?>
                            <div class="modal fade" id="myModal">
                            <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#e8dada;">
                                    <form method="post">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Tambah Job Baru</h4>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <input type="text" name="jobname" placeholder="Nama Posisi" class="form-control"><br>

                                            <textarea name="desc" placeholder="Job Description"></textarea><br>

                                            Start Date: <input type="date" name="start" class="form-control"><br>

                                            End Date: <input type="date" name="end" class="form-control"><br>

                                            End Registration: <input type="date" name="endregist" class="form-control"><br>

                                            <input type="text" placeholder="Job Location" name="jobloc" class="form-control"><br>

                                            <select name="workingtype">
                                                <option selected values="WFH">WFH</option>
                                                <option value="WFO">WFO</option>
                                                <option value="Mix">MIX WFH-WFO / Rolling</option>
                                            </select>

                                            
                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="addjob">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        </tbody>
                    </table>
            </section>
            <!-- 3 Section -->
            <section id="persyaratan" class="main special">
                <header class="major">
                    <h2><strong>Kelola Tata Cara dan Persyaratan Pendaftaran</strong></h2>
                </header>
                <br>
                <div align="right"><button type="button" class="primary" data-toggle="modal" data-target="#uploadSyarat">Upload Persyaratan</button></div>
                <br>
                <div class="data-tables datatable-dark">
                    <table id="table1" class="display" width="100%">
                        <thead style="background-color:#2b2b2b; color:#fff">
                            <tr>
                                <th>Tata Cara</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getdata = mysqli_query($conn, "select * from persyaratan");
                            while ($data = mysqli_fetch_array($getdata)) {
                                $idPersyaratan = $data['idPersyaratan'];
                                $tataCara = $data['tataCara'];
                            ?>

                                <tr>
                                    <form method="post">
                                        <input type="hidden" name="idPersyaratan" value="<?= $idPersyaratan; ?>">
                                        <td><?= $tataCara; ?></td>
                                        <td>
                                        <button type="submit" class="button small" style="background-color:red;" name="deletesyarat">
                                                <font color="white">Delete</font></button>
                                        </td>
                                    </form>
                                </tr>
                            <?php
                            };

                            if (isset($_POST['deletesyarat'])) {
                                $idPersyaratan = $_POST['idPersyaratan'];
                                $querydelete = mysqli_query($conn, "delete from persyaratan where idPersyaratan='$idPersyaratan'");
                                if ($querydelete) {
                                    echo 'Berhasil
                            <meta http-equiv="refresh" content="1;url=admin.php" />';
                                } else {
                                    echo 'Gagal
                            <meta http-equiv="refresh" content="3;url=submit.php" />';
                                };
                            };

                            ?>
                        </tbody>
                    </table>
                <div class="modal fade" id="uploadSyarat">
                    <div class="modal-dialog">
                    <div class="modal-content" style="background-color:#e8dada;">
                        <form method="post" enctype="multipart/form-data">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah File Persyaratan</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="col-6 col-12-xsmall">
								<input type="file" name="tataCara" required>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success" name="addSyarat">Submit</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
            </section>
            <section id="pengumuman" class="main special">
                <header class="major">
                    <h2><strong>Kelola Pengumuman</strong></h2>
                </header>
                <br>
                <div align="right"><button type="button" class="primary" data-toggle="modal" data-target="#uploadPengumuman">Upload Pengumuman</button></div>
                <br>
                <div class="data-tables datatable-dark">
                    <table id="table1" class="display" width="100%">
                        <thead style="background-color:#2b2b2b;color:#fff">
                            <tr>
                                <th>File Pengumuman</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getdata = mysqli_query($conn, "select * from pengumuman");
                            while ($data = mysqli_fetch_array($getdata)) {
                                $idPengumuman = $data['idPengumuman'];
                                $filePengumuman = $data['filePengumuman'];
                            ?>

                                <tr>
                                    <form method="post">
                                        <input type="hidden" name="idPengumuman" value="<?= $idPengumuman; ?>">
                                        <td><?= $filePengumuman; ?></td>
                                        <td>
                                        <button type="submit" class="button small" style="background-color:red;" name="deletepengumuman">
                                                <font color="white">Delete</font></button>
                                        </td>
                                    </form>
                                </tr>
                            <?php
                            };

                            if (isset($_POST['deletepengumuman'])) {
                                $idPengumuman = $_POST['idPengumuman'];
                                $querydelete = mysqli_query($conn, "delete from pengumuman where idPengumuman='$idPengumuman'");
                                if ($querydelete) {
                                    echo 'Berhasil
                            <meta http-equiv="refresh" content="1;url=admin.php" />';
                                } else {
                                    echo 'Gagal
                            <meta http-equiv="refresh" content="3;url=submit.php" />';
                                };
                            };

                            ?>
                        </tbody>
                    </table>
                <div class="modal fade" id="uploadPengumuman">
                    <div class="modal-dialog">
                    <div class="modal-content" style="background-color:#e8dada;">
                        <form method="post" enctype="multipart/form-data">
                            <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Tambah File Pengumuman</h4>
                            </div>
                            <!-- Modal body -->
                            <div class="col-6 col-12-xsmall">
								<input type="file" name="filePengumuman" required>
                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name="addPengumuman">Submit</button>
                            </div>
                        </form>
                    </div>
                 </div>
            </div>
            </section>
        <section id="tambahAdmin" class="main special">
                <header class="major">
                    <h2><strong>Kelola Admin</strong></h2>
                </header>
                <br>
                <div align="right"><button type="button" class="primary" data-toggle="modal" data-target="#my">Tambah Admin Baru</button></div>
                <br>
                <div class="data-tables datatable-dark">
                    <table id="table1" class="display" width="100%">
                        <thead style="background-color:#2b2b2b;color:#fff">
                            <tr>
                                <th>Username</th>
                                <th>Password</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $getdata = mysqli_query($conn, "select * from admin");
                            while ($data = mysqli_fetch_array($getdata)) {
                                $idAdmin = $data['id'];
                                $username = $data['username'];
                                $password = $data['password'];                   
                            ?>

                                <tr>
                                    <form method="post">
                                        <input type="hidden" name="idA" value="<?= $idAdmin; ?>">
                                        <td><?= $username; ?></td>
                                        <td><?= $password; ?></td>
                                        <td>
                                        <a class="button primary small" data-toggle="modal" data-target="#editadmin<?= $idAdmin; ?>">Edit</a>
                                        <button type="submit" class="button small" style="background-color:red;" name="deleteAdmin">
                                        <font color="white">Delete</font></button>
                                        </td>
                                    </form>
                                </tr>


                                <!-- The Modal -->
                                <div class="modal fade" id="edit<?= $idAdmin; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edit <?= $username; ?></h4>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="updateusername" class="form-control" value="<?= $username; ?>"><br>
                                                    <input type="text" name="updatepassword" class="form-control" value="<?= $password; ?>"><br>             
                                                    <input type="hidden" name="updateid" value="<?= $idAdmin; ?>">
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="updateAdmin">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="editadmin<?= $idAdmin; ?>">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form method="post">

                                                <!-- Modal Header -->
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Edits <?= $username; ?></h4>
                                                </div>

                                                <!-- Modal body -->
                                                <div class="modal-body">
                                                    <input type="text" name="updateusername" class="form-control" value="<?= $username; ?>"><br>
                                                    <input type="text" name="updatepassword" class="form-control" value="<?= $password; ?>"><br>             
                                                    <input type="hidden" name="updateid" value="<?= $idAdmin; ?>">
                                                </div>

                                                <!-- Modal footer -->
                                                <div class="modal-footer">
                                                    <button type="submit" class="btn btn-primary" name="updateAdmin">Update</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                            <?php
                            };

                            if (isset($_POST['deleteAdmin'])) {
                                $idA = $_POST['idA'];
                                $querydelete = mysqli_query($conn, "delete from admin where id='$idA'");

                                if ($querydelete) {
                                    echo 'Berhasil
                            <meta http-equiv="refresh" content="1;url=admin.php" />';
                                } else {
                                    echo 'Gagal
                            <meta http-equiv="refresh" content="3;url=submit.php" />';
                                };
                            };

                            ?>
                            <div class="modal fade" id="my">
                            <div class="modal-dialog">
                            <div class="modal-content" style="background-color:#e8dada;">
                                    <form method="post">

                                        <!-- Modal Header -->
                                        <div class="modal-header">
                                            <h4 class="modal-title">Admin baru</h4>
                                        </div>

                                        <!-- Modal body -->
                                        <div class="modal-body">
                                            <input type="text" name="username" placeholder="Nama" class="form-control"><br>
                                            <input type="text" name="password" placeholder="Password" class="form-control"><br>

                                        </div>

                                        <!-- Modal footer -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary" name="addAdmin">Submit</button>
                                        </div>

                                    </form>
                                </div>
                            </div>
                        </div>

                        </tbody>
                    </table>
            </section>
            </div>
        <!-- Footer -->
        <footer id="footer">
            <p class="copyright">DISNAKER PMPTSP 2022</p>
        </footer>
    </div>
    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
</body>


<!-- The Modal -->





<script>
    $(document).ready(function() {
        $('#table1').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });

    $(document).ready(function() {
        $('#table2').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'print'
            ]
        });
    });
</script><!-- jquery latest version -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Start datatable js -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

</html>