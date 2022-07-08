<?php

	include('../conexion/conexion_be.php');
	//se declaran las variables con los valores suministrados en el formulario
	session_start();
    $nombre_completo = $_POST['nombre_completo'];
	$posicion = $_POST['posicion'];
	$cod = $_SESSION['codigo'];
	//se obtiene la fecha y hora
    $fecha = new DateTime();
    //se le establece una zona horaria
    $fecha->setTimezone(new DateTimeZone('America/Caracas'));
    //se guarda la fecha en las variables con el formato indicado
    $fecha_creada = $fecha->format('Y-m-d h:i:s');
    $fecha_actualizada = $fecha_creada;

	//se verifica si se llenaron los campos del formulario, si no se llenaron te envia nuevamente al registro, si se lleno se hace un query
	if(!($nombre_completo == "" or $posicion == "" or $cod =="" or $fecha_creada == "")){
		$query = "INSERT INTO columnas(cod_proyecto, nombre_columna, posicion, fecha_creada, fecha_actual
        ) VALUES('$cod', '$nombre_completo', '$posicion', '$fecha_creada', '$fecha_actualizada')";
	}else{
		echo'
			<script>
				alert("No se llenaron todos los campos, intentelo de nuevo.");
				window.location = "registro.php";
			</script>
		';
		mysqli_close($conexion);
	}
	
	//Verificar que el correo no se repita en la base de Datos
	$verificar_correo = mysqli_query($conexion, "SELECT * FROM columnas WHERE cod_proyecto = '$cod ' and nombre_columna = '$nombre_completo'");
	
	if(mysqli_num_rows($verificar_correo) > 0){
		echo"
			<script>
				alert('Este correo ya esta registrado, intenta con otro diferente');
				window.location = 'registro.php' 
			</script>
			
		";
		exit();
	}
	
	
	$ejecutar = mysqli_query($conexion, $query);
	
	//valida si se ejecuto correctamente la query y manda el mensaje correspondiente
	if($ejecutar){
		echo'
			<script>
				alert("Usuario Registrado Satisfactoriamente");
				window.location = "../index.php";
			</script>
			
		';
		
	}
	else{
		echo'
			<script>
				alert("Intentelo de nuevo, usuario no encontrado");
				window.location = "registro.php";
			</script>
			
		';
	}
	//se cierra la conexion a la base de datos
	mysqli_close($conexion);

?>