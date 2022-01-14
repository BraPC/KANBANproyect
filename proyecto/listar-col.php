<?php
$data = file_get_contents('php://input');
require '../conexion/conexion_be.php';
$consulta = mysqli_query($conexion,'SELECT * FROM columnas ORDER BY posicion DESC');
if ($data != '') {
    $consulta = mysqli_query($conexion,'SELECT * FROM columnas WHERE posicion LIKE '%'.$data.'%' OR cod_proyecto LIKE '%'.$data.'%' OR nombre_columna LIKE '%'.$data.'%'');
}
$resultado = $consulta->fetch_all(PDO::FETCH_ASSOC);
foreach ($resultado as $data) {
    echo "<div class='column'>
    <div class='column-header'>
        <div class='column-title'><span>".$data[1]."</span></div>
        <div class='column-value' hidden value='".$data[1]."' ></div>
        <div class='new-not column-plus icon-proy '><img src='../IMG/ico-plus.png' alt=''></div>
        <div class='column-config icon-proy'><img src='../IMG/ico-config.png' alt=''></div>
        <div class='column-close icon-proy'><img src='../IMG/ico-close.png' alt=''></div>
    </div>
    <div class='column-conten'>
        
    </div>
</div>";
}
