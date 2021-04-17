<?php
if(count($_POST)>0){
	$user = new OdontologoData();
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->city = $_POST["city"];	
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->matricula = $_POST["matricula"];
	$user->add();
print "<script>window.location='index.php?view=odontologos';</script>";
}
?>