<?php
session_start();
?>
<?php
    require "conexionT.php";
    $conexionT = new mysqli("94.242.61.132","txrlfgbv_tutorias","XannaxVarela1234","txrlfgbv_tutorias");
    if($conexionT->connect_errno){
        echo "Error de conexion de la base datos".$conexionT->connect_error;
        exit();
    }

    $sql = "SELECT id_docente,nombre_docente,usuario,contrasena FROM docentes;";
    $sql2 = "SELECT rt.id_reporte_tutorado,rt.nombre,rt.no_control,rt.sesione_individuales,
                    rt.sesiones_grupales,rt.actividad_integradora,rt.conferencias,rt.tallares,
                    rt.psicologia,rt.asesorías,rt.horas_cumplidas,rt.valor_numerico,
                    rt.nivel_dedesempeño   
                    FROM reporte_tutorado rt;";
    $resultado = $conexionT->query($sql);
    $resultado2 = $conexionT->query($sql2);

?>

<!DOCTYPE html>
<html lang="estilo">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Departamento</title>
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
            <li class="nav-item"><a href="GestionarDatosT.html" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>
    <main>
    <h2 class ="titulo">Actulizar Usuario y contraseña</h2>

    <table style="border: 1px solid #000;text-align: center;">
      <tr style="border: 1px solid #000;text-align: center;">
        <td style="border: 1px solid #000;text-align: center;">Id</td>
        <td style="border: 1px solid #000;text-align: center;">Nombre</td>
        <td style="border: 1px solid #000;text-align: center;">Usuario</td>
        <td style="border: 1px solid #000;text-align: center;">Contraseña</td>
      </tr>

      <!--Datos DE LA TABLA-->
      <?php while($datos=$resultado->fetch_array()){?>
        <tr>
          <td style="border: 1px solid #000;text-align: center;"><?php echo $datos["id_docente"]?></td>
          <td style="border: 1px solid #000;text-align: center;"><?php echo $datos["nombre_docente"]?></td>
          <td style="border: 1px solid #000;text-align: center;"><?php echo $datos["usuario"]?></td>
          <td style="border: 1px solid #000;text-align: center;"><?php echo $datos["contrasena"]?></td>
        </tr>
      <?php } ?>

    </table>

    <form action="actualizaus.php" method="POST">  
    <div class = "IncioSnecio">

    <input name = "id" class = "NC" type = "text" placeholder="id">
     
    <input name = "contra1" class = "NC" type = "text" placeholder="contraseña antigua">

    <input name = "usuario" class = "NC" type = "text" placeholder="Usuario nuevo">

    <input name = "contra2" class = "NC" type = "password" placeholder="Contraseña nueva">
    
    <input name = "contra3" class = "NC" type = "password" placeholder="Confirme contraseña">
   

       <div class = "rutas">
        <div class = "buton" style="margin-top: 8%"><button type="submit">ACTUALIZAR</button></div>
        </form>
       </div>
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