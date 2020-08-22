<?php 
	require_once 'connection.php';

	try {
		$conn = new PDO("mysql:host=$host;database=$database", $username, $password);
		echo "Connected to $database at $host successfully.";
	} catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
?>