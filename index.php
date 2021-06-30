<?php
include_once("conexion.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS -->
    <link rel="stylesheet" href="estilo.css">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <title>Mi Libreta</title>
</head>

<body>

    <div class="barra">
        <nav class="navbar navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">MI LIBRETA</a>
            </div>
        </nav>

    </div>
    <br>

    <div class="container-xl">
        <div class="row">
            <div class="col-4">

                <form class="formulario" action="registro.php" method="post">
                    <label class="form-label" for="nombres"> <b>Nombres</b> </label>
                    <input class="form-control" type="text" name="nombres" required>

                    <label class="form-label" for="telefono"> <b>Telefono</b> </label>
                    <input class="form-control" type="number" placeholder="+57" name="telefono" required>

                    <label class="form-label" for="direccion"> <b>Direccion</b> </label>
                    <input class="form-control" type="text" name="direccion">
                    <br>
                    <input class="btn btn-primary" type="submit" value="Registrar">
                </form>
                <br>
                <!-- ALERTA DE REGISTRO GUARDADO -->

                <?php

                if (isset($_SESSION['mensaje'])) { ?>

                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <h5>Registro Agregado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                <?php } ?>


            </div>
            <div class="col-8">
                <table class="table">
                    <thead>
                        <th> Nombres</th>
                        <th>Telefono</th>
                        <th>Direccion</th>
                        <th>Fecha</th>
                        <th></th>
                    </thead>
                    <!-- MOSTRAR DATOS DE LA BASE DE DATOS EN LA TABLA -->

                    <!-- CONSULTA SQL -->

                    <?php
                    $query = "SELECT * FROM registros ORDER BY nombre ASC  ";
                    $resultado = $pdo->query($query);
                    $resultado->fetch();

                    while ($row = $resultado->fetch()) { ?>

                        <tbody>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td><?php echo $row['direccion'] ?></td>
                            <td><?php echo $row['fecha'] ?></td>
                            <td><a href="eliminar.php ?id= <?php echo $row['id']; ?>" class="btn btn-danger">Eliminar</a></td>
                        </tbody>
                       
                    <?php
                        session_unset();
                    } ?>
                </table>
            </div>

        </div>
    </div>
</body>

</html>