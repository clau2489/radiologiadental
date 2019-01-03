<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header" data-background-color="blue">
				<h4 class="title">Turnos Anteriores</h4>
			</div>
		</div>		
		<br>
		<?php

		$users = ReservationData::getOld();
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
				<!--
				<a href="index.php?action=delreservation&id=<?php echo $user->id;?>" class="btn btn-danger btn-xs">Eliminar</a>-->
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
