<!DOCTYPE html>
<html lang="es">
<head>
<title>Insertar</title>
<title>Insertar</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"> <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
</head>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script> </head>
<body>
<?php
require('config.php');
$code = $_POST['code'];
$nombre = $_POST['nombre']; 
$marca = $_POST['marca'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];

$sql = "INSERT INTO producto (code, nombre, marca, precio, cantidad) VALUES ('$code ','$nombre', '$marca', '$precio', '$cantidad')";
if (mysqli_query($conn, $sql)) {
?>
<!-- The Modal -->
<div class="modal-dialog"> <div class="modal-content">
<!-- Modal Header -->
<div class="modal-header"> <h4 class="modal-title">Excelente</h4> <button class="close" onclick="location.href='../inventario1.html'">&times;</button> </div>
<!-- Modal body -->
<div class="modal-body">
Datos grabados safisfactoriamente </div>
<!-- Modal footer -->
<div class="modal-footer">
<button class="btn btn-danger" onclick="location.href='../inventario1.html'">Cerrar</button>
</div>
</div>
<?php
} else
{
    ?>
<!-- The Modal -->
<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
            <h4 class="modal-title">
                Error
            </h4>
            <button class="close" onclick="location.href='../inventario1.html'">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            <?php
                echo "Error grabando datos: <br>" . $sql . "<br>" . mysqli_error($conn);
            ?>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        <button class="btn btn-danger" onclick="location.href='../inventario1.html'">Cerrar</button>
        </div>
        
    </div>
</div>
    <?php
}
mysqli_close($conn);
?>