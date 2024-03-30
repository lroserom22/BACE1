<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>CREAR BASE</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "12345678";
        $dbname = "bdunad18";

        // Create connection 
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Error al conectar: " . mysqli_connect_error());
        }

        // sql to create table
        $sql = "CREATE TABLE producto (
        code INT(10) PRIMARY KEY,
        nombre VARCHAR(50),
        marca VARCHAR(50),
        precio VARCHAR(50),
        cantidad INT(99)
        )";

        if (mysqli_query($conn, $sql)) {
        //echo "Tabla Productos creada satisfactoriamente";
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal cabeza -->
            <div class="modal-header">
                <h4 class="modal-titulo">
                    Excelente
                </h4>
                <button class="close" onclick="location.href='../index.html'">&times;</button>
            </div>

            <!-- Modal cuerpo -->
            <div class="modal-body">
                Base de datos creada satisfactoriamente
            </div>

            <!-- Modal pie de pagina -->
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="location.href='../index.html'">Cerrar</button>
            </div>
        </div>
    </div>
    <?php
        } else {
            echo "Error creando tabla Productos: " . mysqli_error($conn);
    ?>
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal cabeza -->
            <div class="modal-header">
                <h4 class="modal-titulo">
                    Error
                </h4>
                <button class="close" onclick="location.href='../index.html'">&times;</button>
            </div>

            <!-- Modal cuerpo -->
            <div class="modal-body">
                Error creando tabla Productos
            </div>

            <!-- Modal pie de pagina -->
            <div class="modal-footer">
                <button class="btn btn-danger" onclick="location.href='../index.html'">Cerrar</button>
            </div>
        </div>
    </div>
    <?php
        }
        mysqli_close($conn);
    ?>
</body>
</html>