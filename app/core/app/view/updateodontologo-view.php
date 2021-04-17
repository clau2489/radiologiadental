<?php
if(count($_POST)>0){
	$user = OdontologoData::getById($_POST["user_id"]);
	$user->name = $_POST["name"];
	$user->lastname = $_POST["lastname"];
	$user->address = $_POST["address"];
	$user->city = $_POST["city"];	
	$user->email = $_POST["email"];
	$user->phone = $_POST["phone"];
	$user->matricula = $_POST["matricula"];
	$user->update();

print "<script>window.location='index.php?view=odontologos';</script>";
}


?>