<?php 
$NumCon=$_POST['rfc'];
$Pass=$_POST['pass'];
session_start();



$conexion=mysqli_connect("localhost","root","","bd_tutorias");
$consulta="SELECT * FROM coordinador_de_tutorias WHERE ususario = '$NumCon' and contraseña = '$Pass'";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

$nombre=$_SESSION['nombre'];
$apellidoM=$_SESSION['apellidom'];
$apellidop=$_SESSION['apellidop'];


if($filas){     
    header("location:Coordinador.php?numero=$NumCon");    
}else{
   
   header("location:loginC.php?error=true");

    
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>