<?php
	//Si no tienes sesion te reenvia a la pagina principal
	
	session_start();
	if(!isset($_SESSION['usuario'])){
		echo '
			<script>
				alert("no a iniciado seccion");
				window.location = "../index.php";
			</script>
		';
		die();
	}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Register - MagtimusPro</title>
    <!--estilo extraido de https://fonts.googleapis.com recomendable no borrar para no peder el marco del diseño-->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!--estilo que se uso como ejemplo, no necesariamente se tiene que trabajar con este archivo, pero si consequir un diseño similar-->
    <link rel="stylesheet" href="../CSS/estilos.css">
</head>
<!--Las clases se pueden cambiar, pero se tiene que tener en cuenta que el estilo que coloque de ejemplo trabaja con ellas-->
<!--recomiendo hacer un CSS nuevo para estas paginas, en donde te compies de cierta partes que sean necesarias de estilo.css-->
<body>
    <!--si es posible coloca un div o button con forma circular que se encuentre arriba y a la izquiera de la pagina que tenga como enlace la pagina principal-->
        <main>
            <!--div que forma parte del diseño de la pagina registro.php, no es necesaria y se puede eliminar o modificar-->
            <div class="contenedor__todo">
                <div class="caja__trasera">
                    <div class="caja__trasera-login">
                        <h3>¿Ya tienes una cuenta?</h3>
                        <p>Inicia sesión para entrar en la página</p>
                        <button id="btn__iniciar-sesion" class="button">Iniciar Sesión</button>
                    </div>
                    
                </div>

                <!--Formulario de Login y registro, es necesario y no se debe ni elminar, ni modificar-->
                <div class="contenedor__login-register">
                    <!--Login-->
                    <form action="register_proyect_be.php" method="POST" class="formulario__login">
                        <h2>Crear poryecto</h2>
                        <input type="text" placeholder="Nombre" name="nombre_proyecto">
                        <button class="button">Crear</button>
                    </form>

                </div>
            </div>

        </main>

 
</body>
</html>