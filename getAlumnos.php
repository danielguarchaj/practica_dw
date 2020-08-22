<?php 
	include 'connection/connection.php';
    $carnet = $_GET['buscar'];

    if($carnet){
        $query = "SELECT *FROM alumno2 WHERE carnet = '". $carnet. "'";
    }else{
        $query = "SELECT *FROM alumno2 ";
    }

    $result = mysqli_query($conn,$query);

    while($row = mysqli_fetch_array($result)){
        $carnet = $row["carnet"];
        $name = $row['nombre'];
        $lastname = $row['apellid'];

        $array[] = [
            'carnet' => $carnet,
            'name' => $name,
            'lastname' => $lastname
        ];

    }
    echo(json_encode($array));
    mysqli_close($conn);
?>