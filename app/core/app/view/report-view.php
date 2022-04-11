<?php 
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('header-bg.jpg',0,10,210,'C');
    // Arial bold 15
    $this->SetFont('Arial','B',20);
    // Movernos a la derecha
    $this->Cell(80);
    // Título
    //$this->Cell(0,100,'Recordatorio de Turno Presencial',0,0);
    // Salto de línea
    $this->Ln(10);
}

// Pie de página
function Footer()
{   
    $this->Image('footer.png',0,260,210,'C');
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
$basededatos = "radiologiadental";

//Establecemos conexion
$conexion = mysqli_connect( $servidor, $usuario, $contrasena ) or die ("No se pudo conectar a la base de datos");
$db = mysqli_select_db( $conexion, $basededatos ) or die ( "No se pudo conectar a la base de datos" );


//consulta para dia y fecha del turno
$consulta = "SELECT * FROM reservation WHERE id='$id'";
$resultado = mysqli_query( $conexion, $consulta );

while ($columna = mysqli_fetch_array( $resultado ))
{
    $turno = $columna['id'];
    $dia = date('d-m-Y', strtotime($columna['date_at']));
    $hora = $columna['time_at'];
    $paciente = $columna['pacient_id'];
    $category = $columna['category_id'];
    $medic = $columna['medic_id'];
}

//consulta para nombre y apellido del paciente
$consulta_paciente = "SELECT * FROM pacient WHERE id='$paciente'";
$resultado_paciente = mysqli_query( $conexion, $consulta_paciente );
while ($columna_paciente = mysqli_fetch_array( $resultado_paciente ))
{
    $nombre = utf8_decode($columna_paciente['name']);
    $apellido = utf8_decode($columna_paciente['lastname']);
    $documento = $columna_paciente['document'];
    $direccion = utf8_decode($columna_paciente['address']);
    $ciudad = utf8_decode($columna_paciente['city']);
}

//consulta tipo de estudio
$consulta_estudio = "SELECT * FROM category WHERE id='$category'";
$resultado_estudios = mysqli_query( $conexion, $consulta_estudio );
while ($columna_estudios = mysqli_fetch_array( $resultado_estudios ))
{
    $estudios = utf8_decode($columna_estudios['name']);
}

//consulta tipo de estudio
$consulta_medico = "SELECT * FROM medic WHERE id='$medic'";
$resultado_medicos = mysqli_query( $conexion, $consulta_medico );
while ($columna_medicos = mysqli_fetch_array( $resultado_medicos ))
{
    $nombre_medico = utf8_decode($columna_medicos['name']);
    $apellido_medico = utf8_decode($columna_medicos['lastname']);
}


mysqli_close( $conexion );


// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->Cell(0,10,'Recordatorio de Turno Presencial',0,1);
$pdf->SetFont('Arial','',14);
$pdf->Cell(0,10,'Estimado Paciente:',0,1);
$pdf->MultiCell(0,10,'Sr/a '. $apellido.' '. $nombre.' nos contactamos de Radiologia Dental para informarle que el dia '.$dia.' a las '.$hora.'Hs. tiene reservado un turno con el numero: #'.$turno.' para realizar el estudio: '. $estudios .', con el tecnico: '. $apellido_medico .' '. $nombre_medico.' ',0,1);
$pdf->Cell(0,10,'',0,1);
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,utf8_decode('A continuación le detallamos la información de la reserva del turno obtenida:'),0,1);
$pdf->Cell(0,8,'Apellido y Nombre: '. $apellido.' '. $nombre.'',0,1);
$pdf->Cell(0,8,'DNI: '.$documento.'',0,1);
$pdf->Cell(0,8,'Direccion: '. $direccion.'',0,1);
$pdf->Cell(0,8,'Localidad: '.$ciudad.'',0,1);
$pdf->Cell(0,8,'Dia: '.$dia.'',0,1);
$pdf->Cell(0,8,'Horario: '.$hora.'Hs.',0,1);
$pdf->Cell(0,8,'Tipo de estudio: '.$estudios.'',0,1);
$pdf->Cell(0,8,'Tecnico: '.$apellido_medico.' '. $nombre_medico.'',0,1);
$pdf->SetFont('Arial','',12);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(0,7,'Presente este formulario como comprobante valido de turno de DIAGNOSTICO POR IMAGENES hasta la realizacion del estudio, cumpliendo con todos los protocolos del COVID-19',0,1);
$pdf->Cell(0,5,'',0,1);
$pdf->SetFont('Arial','',8);
$pdf->MultiCell(0,5,utf8_decode('AVISO LEGAL: Este mensaje y cualquier archivo anexo al mismo contiene información CONFIDENCIAL y está dirigido únicamente al destinatario en el consignado. Si usted no es el destinatario original de este mensaje o persona debidamente autorizada por él, por favor comunique tal situación al emisor y proceda a su destrucción de inmediato. La copia, reproducción o distribución de este mensaje se encuentra estrictamente prohibida, el uso no autorizado por el emisor puede acarrear consecuencias legales. El emisor no acepta responsabilidad alguna por errores u omisiones contenidos en este mensaje o sus anexos, ni garantiza la seguridad, exactitud o tempestividad de lo transmitido por este medio debido a que el mismo puede ser objeto de alteración, demora, pérdida, u otras anomalías.'),0,1);

$fileName = ''.$nombre.' '.$apellido. '.pdf';
$pdf->Output($fileName, 'D');
?>