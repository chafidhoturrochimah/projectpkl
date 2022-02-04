<?php

if(isset($_POST['addPengumuman'])){

    extract($_POST);
		$nama_file   = $_FILES['filePengumuman']['name'];
		if(!empty($nama_file)){
			// Baca lokasi file sementar dan nama file dari form (fupload)
			$lokasi_file = $_FILES['filePengumuman']['tmp_name'];
			$tipe_file = pathinfo($nama_file, PATHINFO_EXTENSION);
			$file_pengumuman = date('ymdhis').".".$tipe_file;					   
			// Tentukan folder untuk menyimpan file
			$folder = "filePengumuman/$file_pengumuman";
			// Apabila file berhasil di upload
			move_uploaded_file($lokasi_file,"$folder");
		}
		else
			$file_pengumuman="-";

    $tambahjob = mysqli_query($conn,"insert into pengumuman (filePengumuman)
                                    values ('$file_pengumuman')");

    if($tambahjob){
        echo 'Berhasil';
        header('location:admin.php');
    } else {
        echo 'Gagal';
        header('location:admin.php');
    };

};



?>