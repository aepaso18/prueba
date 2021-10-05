<?php
	require_once('conectar.php');

	// Check connection Verificar Conexion
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	//echo "Connected successfully"; 
	$VariablePrueba = "ed";

	$sql = "SELECT id, correo, contrasena FROM usuario where correo = '$VariablePrueba';";
	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	  // output data of each row Datos de salida de cada fila
	  
	  while($row = $result->fetch_assoc()) {
	    	
	    echo "id: " . $row["id"]. " - correo: " . $row["correo"]. "- contrasena " . $row["contrasena"]. "<br>";
	  
	  }
	}else
		{
			echo "0 results";
		}

	$conn->close();

?> 