<?php 
	include 'connection/connection.php';
    $carnet = $_GET['buscar'];

    $query = "SELECT *FROM alumno WHERE carnet = '". $carnet. "'";

    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($result)){
        $carnet = $row["CARNET"];
        $name = $row['NOMBRE'];
        $lastname = $row['APPELIDO'];

        $array[] = [
            'carnet' => $carnet,
            'name' => $name,
            'lastname' => $lastname
        ];

    }
    echo(json_encode($array));
    mysqli_close($conn);
?>