<?php
    if(isset($_POST['updateAdmin'])){
        $u1 = $_POST['updateusername'];
        $u2 = $_POST['updatepssword'];
        $idd = $_POST['updateid'];

        $updateAdmin = mysqli_query($conn,"update admin set username='$u1', password='$u2' where id='$idd'");

        if($updateAdmin){
            echo 'Berhasil
            <meta http-equiv="refresh" content="1;url=admin.php" />';
        } else {
            echo 'Gagal
                  <meta http-equiv="refresh" content="3;url=admin.php" />';
        };


    };
?>