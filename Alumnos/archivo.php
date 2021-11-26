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
                if($datos['documento']==""){?>
        <p>NO tiene archivos</p>
                <?php }else{ ?>
        <iframe src="//XANNAX/files/<?php echo $datos['documento']; ?> frameborder="0" style="overflow:hidden;overflow-x:hidden;overflow-y:hidden;height:100%;width:100%;position:absolute;top:0px;left:0px;right:0px;bottom:0px" height="100%" width="100%""></iframe>
                
                <?php   } } ?>


    </body>
</html>