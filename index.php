<?php
session_start();
require 'backend/koneksi.php';
date_default_timezone_set('Asia/Bangkok');
$date_now = date('Y-m-d');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pendaftaran Online Pelatihan Kerja</title>
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

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <link href="assets/css/writer.css" rel="stylesheet">
  <link href="assets/css/gradient.css" rel="stylesheet">
  <link href="assets/css/header.css" rel="stylesheet">
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
          <li><a class="nav-link scrollto active" href="#hero">Beranda</a></li>
          <li><a class="nav-link scrollto" href="#about">Pelatihan</a></li>
          <li><a class="nav-link scrollto" href="#services">Tata Cara dan Persyaratan</a></li>
          <li><a class="nav-link scrollto" href="#team">Pengumuman</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>
            <a href="" class="typewrite" data-period="2000" data-type='[ "Dinas Tenaga Kerja", "Penanaman Modal dan", "Pelayanan Terpadu", "Satu Pintu Kota Malang" ]'>
              <span class="wrap"></span>
            </a>
          </h1>
          <br>
          <p>Program pelatihan kerja ini memberikan kamu kesempatan untuk mengasah keterampilan agar 
            siap bekerja!
          </p>
          <br>
          <!-- <h1 data-aos="fade-up">DISNAKER-PMPTSP</h1> -->
          <!-- <h2 data-aos="fade-up" data-aos-delay="400">Program pelatihan kerja ini memberikan kamu kesempatan untuk mengasah keterampilan agar siap bekerja</h2> -->
          <div data-aos="fade-up" data-aos-delay="800">
            <a class="dmg" href="#about">Formulir Pelatihan</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
          <img src="assets/img/nakerpmptsp-logo.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section><!-- End Hero -->

   <!-- ======= Clients Section ======= -->
   <section id="clients" class="clients clients">
      <div class="container">

      <div class="section-title" data-aos="fade-up">
          <h2>Pelatihan Kerja</h2>
        </div>

        <div class="container1" data-aos="fade-up" data-aos-delay="100">
          <img src="assets/img/gambarpelatihan.jpeg" alt="gambar 1">
        </div><br>

      <div class="row">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
            <p class="align-left">
              Pelatihan kerja yang dilaksanakan oleh Dinas Ketenagakerjaan, 
              Penanaman Modal dan Pelayanan Terpadu Satu Pintu atau biasa 
              disebut DISNAKER PMPTSP. Pelatihan ini bertujuan untuk memberikan 
              kesempatan kepada calon pekerja untuk melatih keterampilannya. 
              Terdapat banyak kategori keterampilan yang bisa dipilih sesuai 
              dengan minat dan bakat.
            </p>
            <br>
            <p>
              <b>Ayo ikutan dan jangan sampai ketinggalan!</b>
            </p>
          </div>
        </div>

      </div>
    </section><!-- End Clients Section -->

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Pelatihan</h2>
        </div>
        <div class="row content">
          <div class="col-lg-12" data-aos="fade-up" data-aos-delay="150">
          <div class="table-wrapper">
						<table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <th>POSISI TERSEDIA</th>
                  <th>PERIODE</th>
                  <th>DEADLINE PENDAFTARAN</th>
                  <th>AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $getdata = mysqli_query(
                    $conn,"select * from job where registerend>'$date_now'"
                  );
                  while (
                    $data = mysqli_fetch_array($getdata)
                  ) {

                  $idjob = $data['id'];
                  $namajob = $data['jobname'];
                  $descjob = $data['jobdesc'];
                  $mulai = date_format(
                    date_create($data['jobstart']),'d M Y'
                  );
                  $selesai = date_format(
                    date_create($data['jobend']),'d M Y'
                  );
                  $periode = $mulai . ' - ' . $selesai;
                  $deadline = date_format(
                    date_create($data['registerend']),'d M Y'
                  );
                  $jobloc = $data['jobloc'];
                  $workingtype = $data['workingtype'];
                ?>
                                            
                <tr>
                  <td><?= $namajob ?></td>
                  <td><?= $periode ?></td>
                  <td><?= $deadline ?></td>
                  <td><a href="apply.php?id=<?= $idjob ?>" id="dmgradient" class="dmg">Registrasi</a></td>
                </tr>
                                            
                <?php
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
    <!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Tata Cara Dan Persyaratan</h2>
          <p>Silahkan mengunduh file berikut dibawah ini untuk mengetahui lebih lanjut tentang tata cara dan persyaratannya</p>
        </div>

        <div class="row">
          <ul class="actions special">
						<?php
              $query2 = "SELECT * FROM persyaratan ";
							$run2 = mysqli_query($conn,$query2);
										
							while($rows = mysqli_fetch_assoc($run2)){
						?>
            <center>
              <div data-aos="fade-up" data-aos-delay="800">
                <a class="dmg" href="downloadPersyaratan.php?file=<?php echo $rows['tataCara'] ?>">Download</a><br>
              </div>
            </center>
						<?php
							}
						?>
					</ul>
        </div>
      </div>
    </section>
    <!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Pengumuman</h2>
          <p>Silahkan mengunduh file pengumuman sesuai dengan tanggal pengumuman</p>
        </div>

        <div class="row">
          <ul class="actions special">
            <?php
							$query2 = "SELECT * FROM pengumuman ";
							$run2 = mysqli_query($conn,$query2);
										
							while($rows = mysqli_fetch_assoc($run2)){
						?>
            <center>
              <div data-aos="fade-up" data-aos-delay="800">
                <a class="dmg" href="downloadPengumuman.php?file=<?php echo $rows['filePengumuman'] ?>">Download</a><br>
              </div>
            </center>
						<?php
							}
						?>
					</ul>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->

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

</body>

</html>