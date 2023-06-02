<?php 
 $username = "root"; 
 $password = ""; 
 $database = "prodowork"; 

 try {
    $mysqli = new mysqli("localhost", $username, $password, $database); 
    echo "";
 } catch (exception $e) {

    echo "Conexion fallida :(".$e->getMessage();
 }

 //VARIABLE $conn = $mysqli
 $conn = $mysqli;
?>