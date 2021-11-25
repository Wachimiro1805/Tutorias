<?php
require "conexionC.php";
$conexion = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
if($conexion->connect_errno)
{
    echo "Error de conexion de la base datos".$conexion->connect_error;
    exit();
}
$sql = "SELECT * FROM asesorias;";
$resultado = $conexion->query($sql);
?>
<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coordinador</title>
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="../css/estiloD.css">
  </head>

<body>

  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
        <li class="nav-item"><a href="gestionarAsesorias.php" class="nav-link">REGISTRAR</a></li>
            <li class="nav-item"><a href="EliminarAsesoria.php" class="nav-link">ELIMINAR</a></li>
            <li class="nav-item"><a href="ActualizarAsesoria.php" class="nav-link">ACTUALIZAR</a></li>
            <li class="nav-item"><a href="Coordinador.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    
    <main>
    <form action="actualizarAS.php" method="POST" class="formulario">  
    <h2 class ="titulo">Actualizar datos</h2>
    <table width="100%" border="2px" align="center">

    <tr align="center">
        <td>ID</td> 
        <td>Nombre</td>
        <td>Impartidor</td>
        <td>Fecha</td>
        <td>Tipo</td>
        <td>Descripcion</td>
    </tr>
    <?php 
        while($datos=$resultado->fetch_array()){
        ?>
            <tr align="center">
                <td ><?php echo $datos["id_asesorias"]?></td> 
                <td><?php echo $datos["nombre"]?></td> 
                <td><?php echo $datos["nombre_impartidor"]?></td> 
                <td><?php echo $datos["fecha"]?></td> 
                <td><?php echo $datos["tipo_de_asesoria"]?></td> 
                <td><?php echo $datos["descripcion"]?></td> 

            </tr>
            <?php   
        }

     ?>
    </table>
    <div class = "contenedor-form"> 
      <input style="margin-top:2%" name = "id" class = "NC" type = "text" placeholder="ID a Actualizar">
      <input name = "nombre" class = "NC" type = "text" placeholder="Nombre de la asesoria">
      <input name = "impartidor" class = "NC" type = "text" placeholder="¿Quien la impartirá?">
      <div class="row-input">
      <input class="NC" name = "fecha" type="date" placeholder="Fecha de inicio">
      </div>
      <div class="row-input">      
      <select class="NC" name = "asesoria" required>
             <option value=""selected>
                 Tipo de asesoria
             </option>
             <option>
                Taller
             </option>
            <option>
                Conferencias
            </option>
            <option>
                Asesoria academica
            </option>
            <option>
                Asesoria psicologica
            </option>
            <option>
                Tutoria
            </option>
         </select>
      </div>

        <div class="row-input">
        <textarea name = "descripcion" cols = "30" rows="5" placeholder=" Escribe tus comentarios" class="NC"></textarea>
        </div>
   
      </div>
       
       <div class = "rutas">
    
        <div class = "buton" style="margin-top: 8%"><button type="submit">Actualizar</button></div>
 
       </form>
    </main>



    <footer>
      <div class = footerDatos>     
      <h4>Instituto Tecnologico de Tepic</h4>
      <p>"Sabiduria Tecnologica #2595, Lagos del contry."</p>  
      <p>(311) 211 9400</p>
      <p>Tepic, Nayarit. Mexico</p>
      </div>
    </footer>


    <img class = "logo5" src ="../Imagenes/Incio/Icono5.png" alt ="Icono5" width="200">


</body>
</html>