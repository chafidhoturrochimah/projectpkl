<?php

if(isset($_POST['addSyarat'])){

    extract($_POST);
		$nama_file   = $_FILES['tataCara']['name'];
		if(!empty($nama_file)){
			// Baca lokasi file sementar dan nama file dari form (fupload)
			$lokasi_file = $_FILES['tataCara']['tmp_name'];
			$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
			$file_tataCara = date('ymdhis').".".$tipe_file;					   
			// Tentukan folder untuk menyimpan file
			$folder = "filePersyaratan/$file_tataCara";
			// Apabila file berhasil di upload
			move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_tataCara="-";

    $tambahjob = mysqli_query($conn,"insert into persyaratan (tataCara)
                                    values ('$file_tataCara')");

    if($tambahjob){
        echo 'Berhasil';
        header('location:admin.php');
    } else {
        echo 'Gagal';
        header('location:admin.php');
    };

};



?>