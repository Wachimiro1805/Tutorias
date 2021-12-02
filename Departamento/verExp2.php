<!DOCTYPE html>
<?php
include('conexionCT.php');

$tmp = array();
$res = array();

$sel = $conexion->query("SELECT D.id_documento, A.nombreA, A.apellido_p, A.numero_control, C.siglas, D.documento FROM alumnos A INNER JOIN documentos D ON(D.fk_alumno=A.id_alumnos ) INNER JOIN carreras C ON(C.id_carreras = A.fk_carreras) ORDER BY D.id_documento DESC;");
while ($row = $sel->fetch_assoc()) {
    $tmp = $row;
    array_push($res, $tmp);

}
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    
  <header class="navbar navbar-dark bg-dark navbar-expand-md">
    <a style="margin-left: 10px" class="navbar-brand">INSTITUTO TECNOLOGICO <br> DE TEPIC</a>
    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse" id="navbar">
        <ul class="navbar-nav">
            <li class="nav-item"><a href="Departamento.php" class="nav-link">REGRESAR</a></li>
        </ul>
      </div>
      <a href="../index.html"><img  src ="../Imagenes/Incio/Icono4.png"  alt ="Icono2" width="250"></a>
    </header>

    <body>
        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-auto">
                    <h1>Subir Archivos</h1>
                </div>
            </div>
            <div class="row justify-content-md-center">
                <div class="col-8">
 

            

                    <table class="table mt-2">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Alumno</th>
                                <th scope="col">Apellido</th>
                                <th scope="col">Numero de control</th>
                                <th scope="col">siglas</th>
                                <th scope="col">documento</th>
                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($res as $val) { ?>
                                <tr>
                                    <td><?php echo $val['id_documento'] ?> </td>
                                    <td><?php echo $val['nombreA'] ?></td>
                                    <td><?php echo $val['apellido_p'] ?></td>
                                    <td><?php echo $val['numero_control'] ?></td>
                                    <td><?php echo $val['siglas'] ?></td>
                                    <td><a href="archivo.php?id=<?php echo $val['id_documento']?>" target="_blank"><?php echo $val['documento'];?></a></td>
                           
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
      

        <div class="modal fade" id="modalPdf" tabindex="-1" aria-labelledby="modalPdf" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ver archivo</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <iframe id="iframePDF" frameborder="0" scrolling="no" width="100%" height="500px"></iframe>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>

                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script>
                            function onSubmitForm() {
                                var frm = document.getElementById('form1');
                                var data = new FormData(frm);
                                var xhttp = new XMLHttpRequest();
                                xhttp.onreadystatechange = function () {
                                    if (this.readyState == 4) {
                                        var msg = xhttp.responseText;
                                        if (msg == 'success') {
                                            alert(msg);
                                            $('#exampleModal').modal('hide')
                                        } else {
                                            alert(msg);
                                        }

                                    }
                                };
                                xhttp.open("POST", "upload.php", true);
                                xhttp.send(data);
                                $('#form1').trigger('reset');
                            }
                            function openModelPDF(url) {
                                $('#modalPdf').modal('show');
                                $('#iframePDF').attr('src','<?php echo 'http://' . $_SERVER['HTTP_HOST'] . '/uploadfile/'; ?>'+url);
                            }
        </script>

    </body>
</html>
