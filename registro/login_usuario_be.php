<?php

	include('../conexion/conexion_be.php');	
	//verifica si no se abierto seccion
	if(!isset($_SESSION['usuario'])){
		session_start();
		//se declaran las variables
		$correo = $_POST['correo'];
		$contrasena = $_POST['contrasena'];
		//se valida si hay un usuario con ese correo y contrasena
		$validar_login = mysqli_query($conexion, "SELECT nombre_completo FROM usuarios WHERE correo = '$correo' and contrasena = '$contrasena'");
		$files_login = mysqli_fetch_array($validar_login); 
		//en caso de que si, se envia a la pagina index_usuario
		if(mysqli_num_rows($validar_login) > 0){
			$_SESSION['correo'] = $correo;
			$_SESSION['usuario'] = $files_login['nombre_completo'];
			header("location: ../index_usuario.php ");
			exit();
		//en caso de que no, se invia a la pagina registro	
		}else{
			echo '
				<script>
					alert("Usuario o contraseña incorrecta, por favor intentelo de nuevo");
					window.location = "registro.php";
				</script>
			';
			exit();
		}
		mysqli_close($conexion);
	}
	
	if(isset($_SESSION['usuario'])){
		echo
			$_SESSION['usuario']
		;
	}
	

?>
