<?php 
$NumCon=$_POST['control'];
$Pass=$_POST['pass'];
session_start();
$_SESSION['control']=$NumCon;


$conexion=mysqli_connect("localhost","root","","bd_tutorias");
$consulta="SELECT nombre, apellido_p, numero_control FROM alumnos WHERE numero_control = '$NumCon' and contraseña = '$Pass'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas){     
    header("location:Alumno.php");
    ?>
   <?php
   
}else{
   echo '<script language="javascript">';
   echo 'alert("error de autentificacion")';
   echo '</script>';
    ?>
  
    <?php
    
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>