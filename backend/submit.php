<?php
$fullname = $_POST['fullname'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$telepon = $_POST['telepon'];
$motivational = $_POST['motivational'];
$ktp = $_POST['ktp'];
if(isset($_POST['apply'])){
    extract($_POST);
    $nama_file   = $_FILES['foto']['name'];
    if(!empty($nama_file)){
    // Baca lokasi file sementar dan nama file dari form (fupload)
    $lokasi_file = $_FILES['foto']['tmp_name'];
    $tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
    $file_foto = $idreg.".".$tipe_file;

    // Tentukan folder untuk menyimpan file
    $folder = "../img/$file_foto";
    // Apabila file berhasil di upload
    move_uploaded_file($lokasi_file,"$folder");
    }
    else
        $file_foto="-";+

    $insertdata = mysqli_query($conn,"insert into registrant (name,gender,dob,alamat,email,telepon,motivational,foto,ktp,status) 
    values('$fullname','$gender','$dob','$alamat','$email','$telepon','$motivational','$ktp','$file_foto','$status', 'belum dicek')");

    if($insertdata){
        header('location:thanks.php');
    } else {
        echo 'Gagal
        <meta http-equiv="refresh" content="3;url=submit.php" />';
    }
};

?>
