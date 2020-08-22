<?php
    $host = "localhost";
    $database = "ejercicio_dw";
    $username = "root";
    $password = "";

    $conn = mysqli_connect($host,$username,$password,$database);

    if(!$conn){
        die("Connection falided: " . mysqli_connect_error());
    }


?>