<?php
    if(isset($_POST['updatereg'])){
        $status = $_POST['updatestatus'];
        $id = $_POST['updateid'];
        
        $update = mysqli_query($conn,"update registrant set status='$status' where idreg='$id'");

        if($update){
            echo 'Berhasil
            <meta http-equiv="refresh" content="1;url=admin.php" />';
        } else {
            echo 'Gagal
                  <meta http-equiv="refresh" content="3;url=admin.php" />';
        };


    };
?>