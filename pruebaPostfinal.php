<?php
	require_once('conectar.php');

	// Check connection Verificar Conexion
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully"; 
	$VarEmail= $_POST["email"];
	$VarPass= $_POST["pass"];

	$sql="SELECT id, correo, contrasena FROM usuario where correo = '$VarEmail';";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row Datos de salida de cada fila
	  
	  /*while($row = $result->fetch_assoc()) {
	    	
	    echo "id: " . $row["id"]. " - correo: " . $row["correo"]. "- contrasena " . $row["contrasena"]. "<br>";
	  
	  }*/
	  	$resCorrect="Encontrado con exito";
	  	echo $resCorrect;


	}else
		{
			$resError="Contrasena incorrecta, email desconocido";
			echo $resError;
		}

	$conn->close();

?> 