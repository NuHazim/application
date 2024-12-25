<?php
    $dataserver="localhost";
    $datauser="root";
    $datapass="";
    $dataname="application";
    $conn="";

    try{
        $conn=mysqli_connect($dataserver,$datauser,$datapass,$dataname);
    }
    catch(mysqli_sql_exception){
        echo "Could not Connect!";
    }
    

?>