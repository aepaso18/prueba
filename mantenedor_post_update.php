 <?php

	 require_once('conectar.php');
	 // Check connection Verificar Conexion
	 if ($conn->connect_error) 
	     {
	         die("Connection failed: " . $conn->connect_error);
	     }
	 //echo "Connected successfully";
	 $VarId= $_POST["id"];
	 $VarEmail= $_POST["email"];
	 $VarPass= $_POST["pass"];
	 
	 $sql="UPDATE usuario SET correo = '$VarEmail' , contrasena = '$VarPass' WHERE id = '$VarId' ;";
	 //$result = $conn->query($sql);

	 if ($conn->query($sql) === TRUE) 
	 	 {
		     $resCorrect = "ingresado";
	     } 
	 else 
	     {
	         $resCorrect = "Error: " . $sql . "<br>" . $conn->error;
	     }
     echo $resCorrect;
     $conn->close();
	
?>
