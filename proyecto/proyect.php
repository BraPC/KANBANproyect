<?php
	//Si no tienes sesion te reenvia a la pagina principal
	
	session_start();
	if(!isset($_SESSION['usuario'])){
		echo '
			<script>
				alert("Por favor, inicia sesion");
				window.location = "index.php";
			</script>
		';
		die();
		session_destroy();
	}

	
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/normalize.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/style_proyect.css">
    <link rel="stylesheet" href="../CSS/style_proyect-column.css">
    <link rel="stylesheet" href="../CSS/style_proyect-nota.css">
    <title>Kanban</title>
</head>
<body>
    <header class="header">
        <nav class="nav">
            <div class="nav__div div__log">
                <a href=""> <h2>KANBAN<em class="log__proyect">proyect</em></h2></a>
            </div>
            <div class="nav__div">
                <ul class="nav__div-ul ">
                    <li class="nav__item "><a class="div__conten-item" href="../index_usuario.php">Inicio</a> </li>
                    
                    <li class="nav__item "><a class="div__conten-item" href="register_proyect.php">Crear un proyecto</a> </li>
                    
                    <li class="nav__item "><a class="div__conten-item" href="getinto_proyect.php">Ingresar a un proyecto</a> </li>
                    
                </ul>
            </div>
            <div class="nav__div div_conten-button">
                <div class="div_button"><a class="div_button-link"> <?php if(isset($_SESSION['usuario'])){echo
			        $_SESSION['usuario']
		        ;} ?> </a></div>
				<div class="div_button div_button-color"><a class="div_button-link " href="../registro/cerrar_sesion.php">Cerrar Sesion</a></div>
            </div>
        </nav>
    </header>

    

    <section class="section-proyect">
        <div class="conteiner-proyect">
            <div class="container-sidemenu menu-collapsed">
                <div class="menu-collapsed" id="sidemenu">
                    <div id="header-menu">
                        <div id="menu-btn">
                            <div class="btn-hamburger"></div>
                            <div class="btn-hamburger"></div>
                            <div class="btn-hamburger"></div>
                        </div>

                    </div>

                    <div id="profile-menu">
                        <div id="photo"><img src="../IMG/ico-logo.png" alt=""></div>
                        <div id="name">
                            <span>KANBAN<em class="log__proyect">proyect</em></span>
                        </div>
                    </div>

                    <div id="menu-items">
                        <div class="item pointer new-col">
                                <div class="icon"><img src="../IMG/ico-column.png" alt=""></div>
                                <div class="title"><span>Columnas</span></div>
                        </div>
                        <div class="item pointer new-not">
                                <div class="icon"><img src="../IMG/ico-nota.png" alt=""></div>
                                <div class="title"><span>Notas</span></div>
                        </div>
                        <div class="item">
                            <div class="separator"></div>
                            <a href="">
                                <div class="icon"><img src="../IMG/ico-miembros.png" alt=""></div>
                                <div class="title"><span>Miembros</span></div>
                            </a>
                        </div>
                    </div>
                </div>            
            </div>

            <div class="conteiner-conten">
                <div class="conteiner-column">
                    <div class="column">
                        <div class="column-header">
                            <div class="column-title"><span>Titulo</span></div>
                            <div class="column-value" hidden value="" ></div>
                            <div class="new-not column-plus icon-proy "><img src="../IMG/ico-plus.png" alt=""></div>
                            <div class="column-config icon-proy"><img src="../IMG/ico-config.png" alt=""></div>
                            <div class="column-close icon-proy"><img src="../IMG/ico-close.png" alt=""></div>
                        </div>
                        <div class="column-conten">
                            <div class="conteiner-nota">
                                <div class="nota-value" hidden value=""></div>
                                <div class="nota-header">
                                    <div class="nota-title"><span>titulo nota</span></div>
                                    <div class="nota-config icon-proy"><img src="../IMG/ico-config.png" alt=""></div>
                                    <div class="nota-close icon-proy"><img src="../IMG/ico-close.png" alt=""></div>
                                </div>
                                <div class="nota-conten">
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit quas repudiandae provident, 
                                        velit odio, unde esse incidunt expedita, 
                                        quibusdam consequuntur veritatis. Quaerat culpa, sapiente veritatis quisquam 
                                        facere molestias odit voluptates?</p>
                                </div>
                                <div class="nota-footer">
                                    <div class="nota-username"><span>username</span></div>
                                    <div class="nota-progre"><span></span>progreso</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="column-header">
                            <div class="column-tile"><span>Titulo</span></div>
                            <div class="column-value" hidden value="" ></div>
                            <div class="column-plus"><img src="#" alt=""></div>
                            <div class="column-config"><img src="#" alt=""></div>
                            <div class="column-close"><img src="#" alt=""></div>
                        </div>
                        <div class="column-conten">
                            <div class="conteiner-nota">
                                <div class="nota-header">
                                    <div class="nota-title"><span>titulo nota</span></div>
                                    <div class="nota-value" hidden value=""></div>
                                    <div class="nota-config"><img src="#" alt=""></div>
                                    <div class="nota-close"><img src="#" alt=""></div>
                                </div>
                                <div class="nota-conten">

                                </div>
                                <div class="nota-footer">
                                    <div class="nota-username"></div>
                                    <div class="nota-progre"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="conteiner-form">
            <div class="close-form">&times;</div>
            <div class="form">
                <form action = "register-conten.php" method="post" class="formulario__register" id="frm">
                    <h2>Regístrarse</h2>
                    <input type="text" placeholder="Nombre completo" name="nombre_completo" class="input-frm" required>
                    <input type="number" placeholder="Correo Electronico" name="correo" class="input-frm" required>
                    <input type="text" placeholder="Usuario" name="usuario" class="input-frm" required>
                    <input type="password" placeholder="Contraseña" name="contrasena" class="input-frm" required>
                    <button class="button" id="registrar">Regístrarse</button>
                </form>
            </div>
        </div>
    </section>

    <footer>
        <div>
            <div>
                <p>Derechos de autor aqui</p>
            </div>
        </div>
    </footer>
    <script src="registro_proy.js"></script>
    <script>
        const btn = document.querySelector('#menu-btn');
        const menu = document.querySelector('#sidemenu');
        const cont = document.querySelector('.container-sidemenu');

        btn.addEventListener('click', e =>{
            menu.classList.toggle("menu-expanded");
            menu.classList.toggle("menu-collapsed");

            cont.classList.toggle("menu-expanded");
            cont.classList.toggle("menu-collapsed");
            //document.querySelector('body').classList.toggle('body-expanded');
        });
    </script>

    <script src="js/dinamiforms.js"></script>
    
</body>
</html>