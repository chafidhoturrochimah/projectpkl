<?php
if(!empty($_GET['file'])){
    $fileName  = basename($_GET['file']);
    $filePath  = "filePengumuman/".$fileName;
    $ctype="application/octet-stream";
    
    if(!empty($fileName) && file_exists($filePath)){
        //define header
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filePengumuman=$fileName");
        header("Content-Type: application/pdf");
        
        
        // //read file 
        readfile($filePath);
        exit;
        
    }
    else{
        echo "file not exit";
    }
}