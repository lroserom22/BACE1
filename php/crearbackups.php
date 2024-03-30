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

date_default_timezone_set("America/Bogota");

// ruta  backups
$backup_folder = "../backups/"; 

// Comando para crear el archivo de backup
$backup_file = $backup_folder . $dbname . '_backup_' . date('Y-m-d') . '.sql';


$mysqldump = '"C:/xampp/mysql/bin/mysqldump.exe"';


$command = "$mysqldump --no-defaults -u $username -p$password $dbname > $backup_file";

// Ejecutar el comando para crear el backup
exec($command, $output, $return_value);

// Verificar si el backup se creó correctamente
if ($return_value === 0) {
    ?>    
        <!-- The Modal -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">
                            Correcto
                        </h4>
                        <button class="close" onclick="location.href='../index.html'">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <?php
                            echo "Se ha creado el backup correctamente en el archivo $backup_file.";
                        ?>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                    <button class="btn btn-danger" onclick="location.href='../index.html'">Cerrar</button>
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
                        Correcto
                    </h4>
                    <button class="close" onclick="location.href='../index.html'">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <?php
                        echo "Ha ocurrido un error al crear el backup: " . implode("\n", $output);
                    ?>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                <button class="btn btn-danger" onclick="location.href='../index.html'">Cerrar</button>
                </div>
                
            </div>
        </div>
 <?php  
}
?>
