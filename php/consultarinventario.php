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

$sql = "SELECT * FROM producto WHERE code=$code";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) { 
    while($row = mysqli_fetch_assoc($result)) {
?>
<!-- The Modal -->
<div class="modal-dialog">
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Datos</h4>
        <button class="close" onclick="location.href='../inventario4.html'">&times;</button>
        </div>
        <!-- Modal body --> <div class="modal-body">
        <?php
            echo "Id Producto: ". $row["code"]
            ."<br> Nombre Producto: ". $row["nombre"]
            ."<br> Marca Producto: ". $row["marca"]
            ."<br> Precio Producto: ". $row["precio"]
            ."<br> Cantidad Producto: : ". $row["cantidad"]
            .""."<br>";
        ?>   
        </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="location.href='../inventario4.html'">Cerrar</button>
            </div>

        </div>
</div>
    
    <?php
}

} else {
?>
<!-- The Modal -->
<div class="modal-dialog"> 
    <div class="modal-content">
        <!-- Modal Header -->
        <div class="modal-header">
        <h4 class="modal-title">Error</h4>
        <button class="close" onclick="location.href='../inventario4.html'">&times;</button> </div>
        <!--- Modal body -->
        <div class="modal-body">
        <?php
        echo "El producto no existe" . "<br>";
        ?>
        </div>
        <!-- Modal footer -->
        <div class="modal-footer">
        <button class="btn btn-danger" onclick="location.href='../inventario4.html'">Cerrar</button> </div>
        </div>
        </div>
        <?php
}
mysqli_close($conn);
?>