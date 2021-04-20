<?php
$servername = "localhost";
$username = "root";
$password = "usbw";
$dbname = "c1420230_radden";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
	die("Falló la conexión: " . $conn->connect_error);
}
$document = $_POST["document"];
$sql = "select * from pacient where document='$document'";
$query=mysqli_query($conn,"SELECT * FROM pacient WHERE document='$document'");  
$rw = mysqli_fetch_array($query);
$document= $rw[3];

if (empty($document)) {
	$user = new PacientData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->document = $_POST["document"];
	$user->gender = $_POST["gender"];
	$user->day_of_birth = $_POST["day_of_birth"];	
	$user->address = $_POST["address"];
	$user->city = $_POST["city"];	
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->coverage = $_POST["coverage"];
	$user->obra = $_POST["obra"];	
	$user->sick = $_POST["sick"];
	$user->add();
	print "<script>window.location='index.php?view=pacients';</script>";
}
else{
	print "<script>window.location='index.php?view=pacientsError';</script>";
}
?>