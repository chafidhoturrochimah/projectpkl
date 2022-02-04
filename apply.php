<?php
session_start();
require 'backend/koneksi.php';
date_default_timezone_set("Asia/Bangkok");
$date_now = date("Y-m-d", strtotime("-16 years"));
$getid = $_GET['id'];
$getdata = mysqli_query($conn,"select * from job where id='$getid'");
$data = mysqli_fetch_array($getdata);
                    $idjob = $data['id'];
                    $namajob = $data['jobname'];
                    $descjob = $data['jobdesc'];
                    $mulai = date_format(date_create($data['jobstart']),"d M Y");
                    $selesai = date_format(date_create($data['jobend']),"d M Y");
                    $periode = $mulai." - ".$selesai;
                    $deadline = date_format(date_create($data['registerend']),"d M Y");
                    $jobloc = $data['jobloc'];
                    $workingtype = $data['workingtype'];
                    if(isset($_POST['apply'])){
						$fullname = $_POST['fullname'];
						$gender = $_POST['gender'];
						$dob = $_POST['dob'];
						$alamat = $_POST['alamat'];
						$nik = $_POST['nik'];
						$telepon = $_POST['telepon'];
						$motivational = $_POST['motivational'];
						extract($_POST);
						$nama_file   = $_FILES['foto']['name'];
						if(!empty($nama_file)){
						   // Baca lokasi file sementar dan nama file dari form (fupload)
						   $lokasi_file = $_FILES['foto']['tmp_name'];
						   $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
						   $file_foto = date('ymdhis').".".$tipe_file;					   
						   // Tentukan folder untuk menyimpan file
						   $folder = "img/foto/$file_foto";
						   // Apabila file berhasil di upload
						   move_uploaded_file($lokasi_file,"$folder");
						}
						else
						$file_foto="-";
						$nama_ktp   = $_FILES['ktp']['name'];
						if(!empty($nama_ktp)){
							// Baca lokasi file sementar dan nama file dari form (fupload)
							$lokasi_file = $_FILES['ktp']['tmp_name'];
							$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
							$file_ktp = date('ymdhis').".".$tipe_file;					   
							// Tentukan folder untuk menyimpan file
							$folder = "img/ktp/$file_ktp";
							// Apabila file berhasil di upload
								  move_uploaded_file($lokasi_file,"$folder");
						}
						else
							$file_ktp="-";
						$getdatanik = mysqli_query($conn, "select * from registrant where nik = '.$nik.' && where idjob == '.$getid'");
						if($getdatanik == NULL){
							$insertdata = mysqli_query($conn,"insert into registrant (idjob,name,gender,dob,alamat,nik,telepon,motivational,foto,ktp,status) 
							values('$idjob','$fullname','$gender','$dob','$alamat','$nik','$telepon','$motivational','$file_foto','$file_ktp', 'belum dicek')");
							
							if($insertdata){
								header('location:thanks.php');
							} else {
								echo 'Gagal
								<meta http-equiv="refresh" content="3;url=submit.php" />';
							}
						}
						else {
							echo 'Gagal
                            <meta http-equiv="refresh" content="3;url=submit.php" />';
						}
                    };

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?=$namajob;?></title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/logo.png" rel="icon">
  <link href="assets/img/logo.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/writer.css" rel="stylesheet">
  <link href="assets/css/gradient.css" rel="stylesheet">
  <link href="assets/css/form.css" rel="stylesheet">
</head>

<body>
  	<!-- ======= Header ======= -->
	<header id="header" class="fixed-top d-flex align-items-center">
		<div class="container d-flex align-items-center justify-content-between">
			<div class="logo">
				<h1>DISNAKER-PMPTSP</h1>
			</div> 

			<nav id="navbar" class="navbar">
				<ul>
					<li><a class="nav-link scrollto" href="<?=$namajob;?>#hero">Beranda</a></li>
					<li><a class="nav-link scrollto active" href="#about">Pelatihan</a></li>
					<li><a class="nav-link scrollto" href="#services">Tata Cara dan Persyaratan</a></li>
					<li><a class="nav-link scrollto" href="#team">Pengumuman</a></li>
					<li><a class="nav-link scrollto" href="#portfolio">Dokumentasi</a></li>
				</ul>
				<i class="bi bi-list mobile-nav-toggle"></i>
			</nav>
			<!-- .navbar -->
		</div>
  	</header>
	<!-- End Header -->

	<!-- card -->
	<br><br><br><br>
	<div class="card" data-aos="fade-up">
		<h5 class="card-header"><b>JOB PELATIHAN <?=$namajob;?></b></h5>
		<div class="card-body">
			<p class="card-text">
				(<?=$periode;?>), <?=$workingtype;?><br>
				Location: <?=$jobloc;?><br>
				<?=$descjob;?>
			</p>
		</div>
	</div>
	<!-- End card -->

	<div class="section-title" data-aos="fade-up">
        <h2>Formulir Pelatihan Kerja</h2>
    </div>

	<!-- form -->
	<div class="card" data-aos="fade-up" data-aos-delay="300">
		<div class="card-body">
		<form method="post" enctype="multipart/form-data">
            <div class="row">
                <div class="col-sm-6">

                    <div class="form-group">
                        <label>Nama Lengkap:</label>
                        <input type="text" name="fullname" class="form-control" placeholder="Masukan Nama Lengkap" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Nomor Identitas (NIK):</label>
                        <input type="text" name="nik" class="form-control" placeholder="Masukan Nomor NIK" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Tanggal Lahir:</label>
                        <input type="date" class="form-control" name="dob" min="1970-01-02" max="<?=$date_now;?>" required>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <label>Jenis Kelamin:</label>
                        <select class="form-control" name="gender">
                            <option>Pilih</option>
                            <option value="1">Laki-laki</option>
                            <option value="2">Perempuan</option>
                        </select>
                    </div>
                </div>
				<div class="col-sm-6">
                    <div class="form-group">
                        <label>No Telp:</label>
                        <input type="text" name="telepon" class="form-control" placeholder="Masukan No Telp (Whatsapp) dimulai dengan 62" min="1" value="62"required>
                    </div>
                </div>
            </div>

            <div class="row">
				<div class="col-sm-6">
                    <div class="form-group">
                        <label>Alamat:</label>
                        <textarea class="form-control" name="alamat" rows="5" id="alamat" placeholder="Masukkan Alamat Lengkap" required></textarea>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Motivasi:</label>
                        <textarea class="form-control" name="motivasi" rows="5" id="motivasi" placeholder="Motivasi dan Pengalaman Kerja" required></textarea>
                    </div>
                </div>
            </div>

			<div class="row">
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>Foto:</label>
						<div class="row">
                        	<input type="file" name="foto" required>
						</div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="form-group">
                        <label>KTP:</label>
                        <div class="row">
                        	<input type="file" name="ktp" required>
						</div>
                    </div>
                </div>
            </div>
			<br><br>

            <div class="row">
                <div class="col-sm-4">
                    <button type="submit" value="Selesai" class="btn btn-primary" name="apply">Selesai</button>
                    <button type="reset" class="btn btn-secondary">Hapus</button>
                </div>
				<div class="col-sm-4">
                </div>
                <div class="col-sm-3">
                </div>
                <div class="col-sm-1">
                        <button onclick="goBack()" class="btn btn-danger">Kembali</button>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                    </div>
            </div>
        </form>
        </div>
    </div>
    
	<!-- End form -->

	<!-- ======= Footer ======= -->
    <footer id="footer">
    <div class="container">
    <section id="contact" class="contact">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 col-md-8" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>DISNAKER-PMPTSP</h3>
              <p>Perkantoran Terpadu Kota Malang Gedung A lantai 2<br>
              Jl. Mayjend Sungkono Kelurahan Arjowinangun<br>
              Kecamatan Kedungkandang Kota Malang<br>
              65132</p>
              <div class="social-links">
                <a href="https://api.whatsapp.com/send?phone=+628113034112" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
                <a href="https://twitter.com/nakerpmptsp_mlg?s=20" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="https://web.facebook.com/nakerpmptspkotamalang?_rdc=1&_rdr" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="https://www.instagram.com/nakerpmptsp_kotamalang/" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="https://www.youtube.com/channel/UC5S7IhJdTd6mrZQYdSWF86A" class="youtube"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-8 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
              <div>
                <a href="https://www.google.com/maps/place/Perkantoran+Terpadu+Kota+Malang/@-8.0323024,112.639668,17z/data=!4m12!1m6!3m5!1s0x2dd627eab4241a03:0x6763c56ee92a8ada!2sPerkantoran+Terpadu+Kota+Malang!8m2!3d-8.0323024!4d112.6418567!3m4!1s0x2dd627eab4241a03:0x6763c56ee92a8ada!8m2!3d-8.0323024!4d112.6418567">
                  <i class="ri-map-pin-line"></i></a>
                  <p>Perkantoran Terpadu <br>Jl. Mayjen Sungkono No.2, Arjowinangun Kec. Kedungkandang,<br>
                    Kota Malang Jawa Timur <br>65135</p>
                
              </div>

              <div>
                <i class="ri-computer-line"></i>
                <p>disnakerpmptsp.malangkota.go.id</p>
              </div>

              <div>
                <i class="ri-phone-line"></i>
                <p>+62341 751942</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-8 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="300">
            <div class="info">
              <div>
                <a href="https://www.google.com/maps/place/Perkantoran+Terpadu+Kota+Malang/@-8.0323024,112.639668,17z/data=!4m12!1m6!3m5!1s0x2dd627eab4241a03:0x6763c56ee92a8ada!2sPerkantoran+Terpadu+Kota+Malang!8m2!3d-8.0323024!4d112.6418567!3m4!1s0x2dd627eab4241a03:0x6763c56ee92a8ada!8m2!3d-8.0323024!4d112.6418567">
                  <i class="ri-time-line"></i></a>
                  <p>Senin-Kamis : 08.00 - 15.00 WIB <br>
                      Jumat : 07.30 - 14.00 WIB</p>
                
              </div>

              <div>
                <i class="ri-mail-send-line"></i>
                <p>nakerpmptspkotamalang@gmail.com,<br>
                  disnakerpmptsp@malangkota.go.id</p>
              </div>

              <!-- <div>
                <i class="ri-phone-line"></i>
                <p>+62341 751942</p>
              </div> -->
            </div>
          </div>
        </div>

      </div>
    </section>

      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>DISNAKER-PMPTSP</strong>. All Rights Reserved
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Beranda</a>
            <a href="#portfolio" class="scrollto">Dokumentasi</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="dmg back-to-top d-flex align-items-center justify-content-center">
    <i class="bi bi-arrow-up-short"></i>
  </a>

		<!-- Vendor JS Files -->
		<script src="assets/vendor/purecounter/purecounter.js"></script>
		<script src="assets/vendor/aos/aos.js"></script>
		<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
		<script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
		<script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
		<script src="assets/vendor/php-email-form/validate.js"></script>

		<!-- Template Main JS File -->
		<script src="assets/js/main.js"></script>
		<script src="assets/js/writer.js"></script>
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

	</body>
</html>