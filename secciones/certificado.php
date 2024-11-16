<?php
require('../librerias/fdpf/fpdf.php');

include_once('../configuraciones/db.php');
$conexionBD = BD::crearinstancia();

function agregarTexto($pdf, $texto, $x, $y, $aling='L', $fuente, $size=10, $r=0,$g=0,$b=0) {
    $pdf->SetFont($fuente,"",$size);
    //$pdf->Text($x, $y, $texto);
    $pdf->SetXY($x, $y);
    $pdf->SetTextColor($r, $g, $b);
    $pdf->Cell(0,10,$texto,0,0,$aling);
}

function agregarImagen($pdf, $imagen, $x, $y){
    $pdf->Image($imagen,$x, $y,0);
}

$id_curso = isset($_GET['id_curso']) ? $_GET['id_curso'] : '';
$id_alumno = isset($_GET['id_alumno']) ? $_GET['id_alumno'] : '';

$sql = "SELECT alumnos.nombres, alumnos.apellidos, cursos.nombre_curso 
FROM alumnos, cursos WHERE alumnos.id = :id_alumno AND cursos.id = :id_curso";
$consulta = $conexionBD->prepare($sql);
$consulta->bindParam(':id_alumno', $id_alumno);
$consulta->bindParam(':id_curso', $id_curso);
$consulta->execute();
$alumno = $consulta->fetch(PDO::FETCH_ASSOC);
//print_r($alumno);


$pdf = new FPDF("L","mm",array(297,209));
$pdf-> AddPage();
$pdf->SetFont("Arial","B",10);
agregarImagen($pdf, "../src/Certificado.jpg", 0, 0);
agregarTexto($pdf, ucwords(utf8_decode($alumno['nombres']." ". $alumno['apellidos'])), 105, 90, 'L', "Times", 30, 255, 255, 255); 
agregarTexto($pdf, $alumno['nombre_curso'], -210, 140, 'C', "Times", 20, 255, 255, 255);
agregarTexto($pdf, date("d/m/Y"), -335, 165.5, 'C', "Times", 18, 255, 255, 255);
$pdf->Output();
