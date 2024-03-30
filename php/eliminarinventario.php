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
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "bdunad18";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener el código del producto que se desea eliminar
$code = $_POST['code'];

// Verificar si el producto existe
$sql = "SELECT * FROM producto WHERE code = '$code'";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 0) {
    ?>    
    <!-- The Modal -->
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        Error
                    </h4>
                    <button class="close" onclick="location.href='../inventario3.html'">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                        echo "Error codigo no existe: <br>" . $sql . "<br>" . mysqli_error($conn);
                    ?>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button class="btn btn-danger" onclick="location.href='../inventario3.html'">Cerrar</button>
                </div>
                
            </div>
        </div>
 <?php    
} else {
    // Eliminar el producto
    $sql = "DELETE FROM producto WHERE code = '$code'";
    if ($conn->query($sql) === TRUE) {
      ?>    
        <!-- The Modal -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Correcto
                        </h4>
                        <button class="close" onclick="location.href='../inventario3.html'">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php
                            echo "Datos eliminados Correctamente <br>";
                        ?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button class="btn btn-danger" onclick="location.href='../inventario3.html'">Cerrar</button>
                    </div>
                    
                </div>
            </div>
     <?php    
    } else {
        ?>    
        <!-- The Modal -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Error
                        </h4>
                        <button class="close" onclick="location.href='../inventario3.html'">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php
                            echo "Error codigo no existe: <br>" . $sql . "<br>" . mysqli_error($conn);
                        ?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button class="btn btn-danger" onclick="location.href='../inventario3.html'">Cerrar</button>
                    </div>
                    
                </div>
            </div>
     <?php    
    }
}

$conn->close();
?>