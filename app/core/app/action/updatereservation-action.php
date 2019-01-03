<?php
if(count($_POST)>0){
	$user = ReservationData::getById($_POST["id"]);
	$user->medic_id = $_POST["medic_id"];
	$user->date_at = $_POST["date_at"];
	$user->time_at = $_POST["time_at"];
	$user->status_id = $_POST["status_id"];
	$user->coverage_id = $_POST["coverage_id"];
	$user->payment_id = $_POST["payment_id"];
	$user->payment_type_id = $_POST["payment_type_id"];
	$user->price = $_POST["price"];
	$user->medic = $_POST["medic"];
	$user->info = $_POST["info"];
	$user->update();

Core::alert("Datos actualizados exitosamente!");
print "<script>window.location='index.php?view=reservations';</script>";

}
?>