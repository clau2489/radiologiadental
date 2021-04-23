<link rel="stylesheet" type="text/css" href="DataTables/datatables.min.css"/> 
<script type="text/javascript" src="DataTables/datatables.min.js"></script>	
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<h4 class="title">Turnos Anteriores</h4>
		</div>		
		<br>
		<?php
		$users = ReservationData::getOld();
		if(count($users)>0){
// si hay usuarios
			?>
			<table id="example" class="stripe" style="width:100%">
				<thead>
					<th>Fecha</th>
					<th>Hora</th>				
					<th>Nombre del Paciente</th>
					<th>Técnico asignado</th>
					<th></th>
				</thead>
				<?php
				foreach($users as $user){
					$pacient  = $user->getPacient();
					$medic = $user->getMedic();
					?>
					<tr>
						<td><?php date_default_timezone_set('America/Argentina/Buenos_Aires'); $nueva_fecha = date("d-m-Y",strtotime($user->date_at)); echo $nueva_fecha; ?></td>
						<td><?php echo $user->time_at; ?></td>					
						<td><?php echo $pacient->lastname." ".$pacient->name; ?></td>
						<td><?php echo $medic->lastname." ".$medic->name; ?></td>

						<td>
							<div class="dropdown">
								<button class="btn btn-default btn-block">Opciones</button>
								<div class="dropdown-content">
									<a href="index.php?view=editreservation&id=<?php echo $user->id;?>"> Ver</a>
									<!--<a href="index.php?action=delreservation&id=<?php echo $user->id;?>"> Eliminar</a> -->
								</div>
							</div>
						</td>
					</tr>
					<?php
				}
			}else{
				echo "<p class='alert alert-danger'>No hay pacientes</p>";
			}
			?>
		</table>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function() {
		$('#example').DataTable();
	} );
</script>