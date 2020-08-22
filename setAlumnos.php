<?php 
	try {
        include 'connection/connection.php';
        $carnet = $_POST['carnet'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];

        $query = "INSERT INTO alumno2 values(".$carnet.",'".$name."','".$lastname."')";

        $result = mysqli_query($conn,$query);
        
        if($result){
            $response = [
                'status' => true,
                'message' => 'alumno registrado'
            ];

            echo (json_encode($response));
        }else{
            $response = [
                'status' => false,
                'message' => 'ocurrio un error'
            ];

            echo (json_encode($response));
        }
        
        mysqli_close($conn);
    } catch (\Throwable $th) {
        echo json_encode($th);
    }
?>