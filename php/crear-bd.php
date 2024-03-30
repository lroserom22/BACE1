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

// Create connection
$conn = mysqli_connect($servername, $username, $password);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}

// Check connection
$sql = "CREATE DATABASE IF NOT EXISTS bdunad18";
if (mysqli_query ( $conn, $sql)) {
?>

<!-- The Modal -->
<div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal header -->
        <div class="modal-header">
            <h4 class="modal-title">
                Excelente
            </h4>
            <button 
                class="close" onclick="location.href='../index.html'">&times;
            </button>
        </div>

        <!-- Modal body -->
        <div class="modal-body">
            Base de datos creada satisfactoriamente
        </div>

        <!-- Modal footer -->
        <div class="modal-footer">
            <button class="btn btn-danger" onclick="location.href='../index.html'"> Cerrar </button>
        </div>
    </div>
</div>

<?php
} 
else {
    ?>
    <!-- Modal dialog -->
<div class="modal-dialog"> 
    <div class="modal-content">
     
        <!-- Modal header -->
       <div class="modal-header">
            <h4 class="modal-title">Error</h4>
            <button class="close" onclick="location.href='../index.html'">&times;</button>
        </div>
        <!-- Modal body -->
        <div class="modal-body">
            Base de datos no se puede crear, ya existe.
        </div>
        <!-- Modal footer -->
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