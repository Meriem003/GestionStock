<?php
$servername = "localhost";
$username = "root";
$serverpassword = "";
$dbname ="gestionproduits";
try{
    $dns = "mysql:host=".$servername.";dbname=".$dbname;
    $pdo = new PDO ($dns,$username,$serverpassword);
    // echo "siiiiiiiir";
}catch(PDOException $e){
    echo "error conn";
}
