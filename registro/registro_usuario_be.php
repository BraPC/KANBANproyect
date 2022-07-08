<?php

	include('../conexion/conexion_be.php');
	//se declaran las variables con los valores suministrados en el formulario
	$nombre_completo = $_POST['nombre_completo'];
	$correo = $_POST['correo'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	//se verifica si se llenaron los campos del formulario, si no se llenaron te envia nuevamente al registro, si se lleno se hace un query
	if(!($nombre_completo == "" or $correo == "" or $usuario =="" or $contrasena == "")){
		$query = "INSERT INTO usuarios(nombre_completo, correo, usuario, contrasena) VALUES('$nombre_completo', '$correo', '$usuario', '$contrasena')";
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
	$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
	$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
	
	if(mysqli_num_rows($verificar_correo) > 0){
		echo"
			<script>
				alert('Este correo ya esta registrado, intenta con otro diferente');
				window.location = 'registro.php' 
			</script>
			
		";
		exit();
	}
	
	//Verificar que el usuario no se repita en la base de Datos
	$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
	
	if(mysqli_num_rows($verificar_usuario) > 0){
		echo'
			<script>
				alert("Este usuario ya esta registrado, intenta con otro diferente");
				window.location = "registro.php" 
			</script>
			
		';
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
