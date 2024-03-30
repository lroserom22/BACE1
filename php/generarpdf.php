<?php
require('../fpdf185/fpdf.php');

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "12345678";
$dbname = "bdunad18";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Consulta a la tabla producto
$sql = "SELECT * FROM producto";
$resultado = $conn->query($sql);

// Crear objeto PDF
$pdf = new FPDF();
$pdf->AddPage();

// Agregar imagen de encabezado
$pdf->Image('../img/01.PNG', 10, 10, 50, 20);

// Definir fuente y tamaño de letra para el título
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 30, 'Informe de productos', 0, 1, 'C');

// Definir fuente y tamaño de letra para los encabezados de la tabla
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(30, 10, 'Codigo', 1);
$pdf->Cell(60, 10, 'Nombre', 1);
$pdf->Cell(40, 10, 'Marca', 1);
$pdf->Cell(30, 10, 'Precio', 1);
$pdf->Cell(30, 10, 'Cantidad', 1);
$pdf->Ln();

// Definir fuente y tamaño de letra para el contenido de la tabla
$pdf->SetFont('Arial', '', 12);

// Agregar filas a la tabla con los datos de la consulta
while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(30, 10, $fila['code'], 1);
    $pdf->Cell(60, 10, $fila['nombre'], 1);
    $pdf->Cell(40, 10, $fila['marca'], 1);
    $pdf->Cell(30, 10, $fila['precio'], 1);
    $pdf->Cell(30, 10, $fila['cantidad'], 1);
    $pdf->Ln();
}

// Mostrar el documento PDF
$pdf->Output();
?>
