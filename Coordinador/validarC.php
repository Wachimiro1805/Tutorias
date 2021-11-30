<?php 
session_start(); 
$NumCon=$_POST['rfc'];
$Pass=$_POST['pass'];

$_SESSION['usuario'] = $NumCon;


$conexion=mysqli_connect("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
$consulta="SELECT * FROM coordinador_de_tutorias WHERE usuario = '$NumCon' AND contrasena = '$Pass';";
$resultado=mysqli_query($conexion,$consulta);
$filas=mysqli_num_rows($resultado);

if($filas){     
    header("location:Coordinador.php?numero=$NumCon");    


}else{
   header("location:loginC.php?error=true");


    
}
mysqli_free_result($resultado);
mysqli_close($conexion);
?>