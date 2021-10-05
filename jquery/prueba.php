<?php
	require_once('conectar.php');

	

	$sql = "SELECT id, correo, contrasena FROM usuario";
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