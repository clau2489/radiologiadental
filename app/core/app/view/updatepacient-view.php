<?php

if(count($_POST)>0){
	$user = PacientData::getById($_POST["user_id"]);
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
	$user->update();

Core::alert("Actualizado exitosamente!");
print "<script>window.location='index.php?view=pacients';</script>";


}


?>