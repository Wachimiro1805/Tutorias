<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


         <?php
        include 'conexionCT.php';
            $sql = "SELECT * FROM documentos WHERE id_documento=".$_GET['id'];
            $result = $conexion->query($sql);
            while($datos=mysqli_fetch_array( $result )){
                if($datos['documento']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
        <iframe src="archivos/<?php echo $datos['documento']; ?>"></iframe>
                
                <?php } } ?>


    </body>
</html>
