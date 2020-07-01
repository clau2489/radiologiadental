<?php 
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('header-bg.jpg',0,10,210,'C');
    // Arial bold 15
    $this->SetFont('Arial','B',28);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    $this->Cell(30,100,'Turno Presencial COVID-19',0,0,'C');
    // Salto de línea
    $this->Ln(20);
}

// Pie de página
function Footer()
{   
    $this->Image('footer.png',0,200,210,'C');
    // Posición: a 1,5 cm del final
    $this->SetY(-12);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
}
}
//tomamos el ID del turno
$id = $_GET['id'];

//Valores de conexion
$usuario = "root";
$contrasena = "";
$servidor = "localhost";
$basededatos = "c1420230_radden";

//Establecemos conexion
$conexion = mysqli_connect( $servidor, $usuario, "" ) or die ("No se pudo conectar a la base de datos");
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "No se pudo conectar a la base de datos" );


//consulta para dia y fecha del turno
$consulta = "SELECT * FROM reservation WHERE id='$id'";
$resultado = mysqli_query( $conexion, $consulta );

while ($columna = mysqli_fetch_array( $resultado ))
{
    $turno = $columna['id'];
    $dia = $columna['date_at'];
    $hora = $columna['time_at'];
    $paciente = $columna['pacient_id'];
}

//consulta para nombre y apellido del paciente
$consulta_paciente = "SELECT * FROM pacient WHERE id='$paciente'";
$resultado_paciente = mysqli_query( $conexion, $consulta_paciente );
while ($columna_paciente = mysqli_fetch_array( $resultado_paciente ))
{
    $nombre = $columna_paciente['name'];
    $apellido = $columna_paciente['lastname'];
    $documento = $columna_paciente['document'];
    $direccion = $columna_paciente['address'];
    $ciudad = $columna_paciente['city'];
}


mysqli_close( $conexion );


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,''. $apellido.' '. $nombre.', DNI: '.$documento.'',0,1);
$pdf->Cell(0,10,'Direccion: '. $direccion.'  -  Localidad: '.$ciudad.'',0,1);
$pdf->SetFont('Arial','',18);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'El turno que usted solicito en RADIOLOGIA DENTAL',0,1);
$pdf->Cell(0,10,'para el dia: '. $dia .'',0,1);
$pdf->Cell(0,10,'ha sido confirmado correctamente con el numero: ',0,1);
$pdf->SetFont('Arial','B',20);
$pdf->Cell(0,10,'#'.$turno.'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'Presente este formulario como comprobante valido de turno de DIAGNOSTICO POR IMAGENES',0,1);
$pdf->Cell(0,10,'hasta la realizacion del estudio, cumpliendo con todos los protocolos del COVID-19',0,1);

$fileName = ''.$nombre.' '.$apellido. '.pdf';
$pdf->Output($fileName, 'D');
?>