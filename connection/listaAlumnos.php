<?php 
	require_once 'connection.php';

	try {
        $conn = new mysqli($host, $username, $password, $database);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
      
        $sql = "SELECT * FROM alumno";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            $html = '';
            while($row = $result->fetch_assoc()) {
                $html .= "<tr><td>". $row["CARNET"]. "</td> <td>" . $row["NOMBRE"]. "</td> <td>" . $row["APPELIDO"]."</td></tr>";
            }
            echo $html;
        }
        $conn->close();

	} catch (PDOException $pe) {
		die("Could not connect to the database $dbname :" . $pe->getMessage());
	}
?>