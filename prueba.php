<?php
require "conexionC.php";
$conexion = new mysqli("localhost","root","","bd_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT A.nombre, A.apellido_p, A.apellido_m, A.numero_control, G.nombre_grupo, C.siglas FROM alumnos A INNER JOIN grupos G ON(G.id_grupo = A.fk_grupo) INNER JOIN carreras C ON(C.id_carreras = A.fk_carreras);";
$sql2 = "SELECT D.nombre_docente, D.apellido_p, D.apellido_m, C.siglas FROM docentes D INNER JOIN carreras C ON(C.id_carreras = D.fk_carreras);";
$resultado = $conexion->query($sql);
$resultado2 = $conexion->query($sql2);
?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>
    <h1 align="center">Alumnos</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Numero de control</td>
        <td>Grupo</td>
        <td>Carrera</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr>
                <td><?php echo $datos["nombre"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["numero_control"]?></td>
                <td><?php echo $datos["nombre_grupo"]?></td>
                <td><?php echo $datos["siglas"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table>

    <h1 align="center">Docentes</h1>
    <table width="70%" border="1px" align="center">

    <tr align="center">
        <td>Nombre</td>
        <td>Apellido Paterno</td>
        <td>Apellido Materno</td>
        <td>Carrera</td>
    </tr>
    <?php 
        while($datos=$resultado2->fetch_array()){
        ?>
            <tr>
                <td><?php echo $datos["nombre_docente"]?></td>
                <td><?php echo $datos["apellido_p"]?></td>
                <td><?php echo $datos["apellido_m"]?></td>
                <td><?php echo $datos["siglas"]?></td>
            </tr>
            <?php   
        }

     ?>
    </table>

</body>
</html>