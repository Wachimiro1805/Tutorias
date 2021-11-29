<?php 
session_start();
$NumCon=$_POST['rfc'];
$Pass=$_POST['pass'];

$_SESSION["usuario"] = $NumCon;


$conexion=mysqli_connect("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
$consulta="SELECT * FROM jefe_departamento WHERE usuario = '$NumCon' AND contrasena = '$Pass';";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas){     
    header("location:Departamento.php?numero=$NumCon");    


}else{

header("location:loginD.php?error=true");


    
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>
