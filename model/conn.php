<?php
$servername = "localhost";
$username = "root";
$serverpassword = "";
$dbname ="gestionproduits";
try{
    $dns = "mysql:host=".$servername.";dbname=".$dbname;
    $conn = new PDO ($dns,$username,$serverpassword);
}catch(PDOException $e){
    echo "error conn";
}
