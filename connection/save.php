<?php 
	require_once 'connection.php';

	try {
		$conn = new PDO("mysql:host=$host;dbname=$database", $username, $password);
        $sql = "INSERT INTO alumno (CARNET, NOMBRE, APPELIDO)
        VALUES (". $_POST["carnet"] .", '". $_POST['nombre'] ."', '". $_POST['apellido'] ."')";
        $conn->exec($sql);
        echo 1;
	} catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
?>