<?php
session_start();
require 'backend/koneksi.php';

if(!isset($_SESSION['username'])){

} else {
    header('location:admin.php');
}

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $cekuname = mysqli_query($conn,"select * from admin where username='$username' and password='$password'");
    $cekrow = mysqli_num_rows($cekuname);

    if($cekrow>0){
        $_SESSION['username'] = $username;
        header('location:admin.php');
    } else {
        echo 'Password salah';
        header('location:login.php');
    }
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<meta content="width=device-width, initial-scale=1.0" name="viewport">

	<title>Login Sebagai Admin</title>
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
	<link href="assets/css/login.css" rel="stylesheet">
	</head>

	<body>

		<!-- Form Login -->
		<section>
		<div class="wrapper" data-aos="fade-up" data-aos-delay="800">
			<div class="logo" data-aos="fade-up"> 
				<img src="assets/img/logo.png" class="img-fluid animated" alt=""> 
			</div>
			<div class="text-center mt-4 name"> Login Admin </div>
			<form class="p-3 mt-3" method="post">
				<div class="form-field d-flex align-items-center"> 
					<i class="ri-user-line"></i>
					<input type="text" name="username" placeholder="Username"> 
				</div>
				<div class="form-field d-flex align-items-center"> 
					<i class="ri-key-line"></i>
					<input type="password" name="password" id="pwd" placeholder="Password"> 
				</div> 
				<button class="btn mt-3" type="submit" value="Login" name="login">Login</button>
			</form>
			<!-- <div class="text-center fs-6"> <a href="#">Forget password?</a> or <a href="#">Sign up</a> </div> -->
		</div>
		</section>
		<!-- End Form Login -->

		<!-- ======= Footer ======= -->
		<div class="copyright text-center">
			&copy; Copyright <strong>DISNAKER-PMPTSP</strong>. All Rights Reserved
		</div>
		<br><br><br>
		<!-- End Footer -->


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
	</body>
</html>