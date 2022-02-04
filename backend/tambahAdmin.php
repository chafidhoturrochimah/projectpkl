<?php

if(isset($_POST['addAdmin'])){

    $n = $_POST['username'];
    $d = $_POST['password'];

    $tambahAdmin = mysqli_query($conn,"insert into admin (username,password)
                                    values ('$n','$d')");

    if($tambahAdmin){
        echo 'Berhasil';
        header('location:admin.php');
    } else {
        echo 'Gagal';
        header('location:admin.php');
    };

};



?>