<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Administración de Turnos</h4>
			</div>
			<div class="card-content table-responsive">
				<div class="row">
					<div class="col-md-2">
						<a href="./index.php?view=newreservation" class="btn btn-block btn-primary"><i class='fa fa-plus-circle'></i> Nuevo Turno</a>						
					</div>
					<div class="col-md-2">
						<a href="./index.php?view=oldreservations" class="btn btn-block btn-warning"><i class='fa fa-folder-open'></i> Anteriores</a>						
					</div>					
				</div>
			<br>
			<br>
		<?php
$users= array();
if((isset($_GET["q"]) && isset($_GET["pacient_id"]) && isset($_GET["medic_id"]) && isset($_GET["date_at"])) && ($_GET["q"]!="" || $_GET["pacient_id"]!="" || $_GET["medic_id"]!="" || $_GET["date_at"]!="") ) {
$sql = "select * from reservation where ";
if($_GET["q"]!=""){
	$sql .= " title like '%$_GET[q]%' and note like '%$_GET[q] %' ";
}

if($_GET["pacient_id"]!=""){
if($_GET["q"]!=""){
	$sql .= " and ";
}
	$sql .= " pacient_id = ".$_GET["pacient_id"];
}

if($_GET["medic_id"]!=""){
if($_GET["q"]!=""||$_GET["pacient_id"]!=""){
	$sql .= " and ";
}

	$sql .= " medic_id = ".$_GET["medic_id"];
}



if($_GET["date_at"]!=""){
if($_GET["q"]!=""||$_GET["pacient_id"]!="" ||$_GET["medic_id"]!="" ){
	$sql .= " and ";
}

	$sql .= " date_at = \"".$_GET["date_at"]."\"";
}

		$users = ReservationData::getBySQL($sql);

}else{
		$users = ReservationData::getAll();

}
		if(count($users)>0){
			// si hay usuarios
			?>
			<table class="table table-bordered table-hover">
			<thead>
			<th>Fecha</th>
			<th>Hora</th>				
			<th>Nombre del Paciente</th>
			<th>Técnico asignado</th>
			<th>Ver</th>
			</thead>
			<?php
			foreach($users as $user){
				$pacient  = $user->getPacient();
				$medic = $user->getMedic();
				?>
				<tr>
				<td><?php $nueva_fecha = date("d-m-Y",strtotime($user->date_at)); echo $nueva_fecha; ?></td>
				<td><?php echo $user->time_at; ?></td>					
				<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
				<td><?php echo $medic->lastname." ".$medic->name; ?></td>
				<td style="width:50px;">
				<a href="index.php?view=editreservation&id=<?php echo $user->id;?>" class="btn btn-success btn-xs"><i class='fa fa-eye'></i></a>
				</td>
				</tr>
				<?php

			}
			?>
			</table>
			</div>
			</div>
			<?php



		}else{
			echo "<p class='alert alert-danger'>No hay pacientes</p>";
		}


		?>


	</div>
</div>