<?php 
	include 'connection/connection.php';
    $carnet = $_GET['buscar'];
	$query = "SELECT *FROM alumno WHERE nombre_completo = '". $carnet. "'";

        $result = mysqli_query($conn,$query);

        while($row = mysqli_fetch_array($result)){
            $nombre= $row["nombre_completo"];
            $array[] = [
                'nombre' => $nombre
            ];


        }
        echo(json_encode($array));
    
        
?>