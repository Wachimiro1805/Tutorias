<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


         <?php
        include 'conexionA.php';
            $sql = "SELECT * FROM documentos WHERE id_documento=".$_GET['id'];
            $result = $conexion->query($sql);
            while($datos=mysqli_fetch_array( $result )){
                if($datos['archivo']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
        <iframe src="files/<?php echo $datos['nombre']; ?>"></iframe>
                
                <?php } } ?>


    </body>
</html>
